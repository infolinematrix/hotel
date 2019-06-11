<?php

namespace ReactorCMS\Exceptions;


use Exception;
use Illuminate\Validation\ValidationException;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{

    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        AuthorizationException::class,
        HttpException::class,
        ModelNotFoundException::class,
        ValidationException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception $e
     * @return void
     */
    public function report(Exception $e)
    {
        parent::report($e);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Exception $e
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $e)
    {

        if (is_a($e, ModelNotFoundException::class) && is_request_reactor()) {

            $request->session()->reflash();

            if ($e->getModel() === 'Reactor\Hierarchy\Node') {
                return redirect()->route('reactor.nodes.index');
            } elseif ($e->getModel() === 'Reactor\Hierarchy\MailingNode') {
                return redirect()->route('reactor.mailings.index');
            }
        }


        $class = get_class($e);

        switch ($class) {
            case 'Illuminate\Auth\AuthenticationException':
                $guard = array_get($e->guards(), 0);
                switch ($guard) {
                    case 'admin':
                        $login = 'reactor.auth.login';
                        break;
                    default:
                        $login = 'login';
                        break;
                }

                return redirect()->route($login);
        }

        return parent::render($request, $e);
    }
}


