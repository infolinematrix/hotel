<?php


namespace ReactorCMS\Html\Builders;


use Illuminate\Database\Eloquent\Collection;
use Reactor\Hierarchy\Node;

class NodesHtmlBuilder {

    /**
     * Makes an array of ancestor links
     *
     * @param Collection $ancestors
     * @return array
     */
    public function ancestorLinks(Collection $ancestors)
    {
        $links = [];

        foreach ($ancestors as $ancestor)
        {
            $links[] = link_to($ancestor->getDefaultEditUrl(), $ancestor->getTitle());
        }

        return $links;
    }

    /**
     * Snippet for displaying node default content options
     *
     * @param Node $node
     * @param string $header
     * @param bool $table
     * @return string
     */
    public function nodeOptions(Node $node, $header = null, $table = true)
    {
        $id = $node->getKey();
        $sourceId = $node->translateOrFirst()->getKey();

        $html = '';
        $html .= '
            <div class="btn-group">
                        <button type="button" class="btn btn-xs" data-toggle="dropdown">
                            <i class="fa fa-bars"></i>
                        </button>';
        $html .= '<ul class="dropdown-menu pull-right" role="menu">';


        if ($node->canHaveChildren())
            {
                $html .= '<li class="dropdown">
                    <a href="' . route('reactor.nodes.create', $id) . '">
                        <i class="fa fa-ellipsis-v"></i>' . trans('nodes.add_child') . '</a>
                </li>';
            }

        $html .= '<li class="dropdown">
            <a href="' . route('reactor.nodes.edit', [$id, $sourceId]) . '">
                <i class="fa fa-ellipsis-v"></i>' . trans('nodes.edit') . '</a>
        </li>';

        if ($node->canHaveMoreTranslations())
        {
            $html .= '<li>
                <a href="' . route('reactor.nodes.translation.create', [$id, $sourceId]) . '">
                    <i class="fa fa-ellipsis-v"></i>' . trans('general.add_translation') . '</a>
            </li>';
        }

        $html .= '<li">' .
            delete_form(
                route('reactor.nodes.destroy', $id),
                trans('nodes.destroy'),'') .
            '</li>
        
        <li>' . $this->nodeOptionForm(
            $node->isPublished() ? route('reactor.nodes.unpublish', $id) : route('reactor.nodes.publish', $id),
            $node->isPublished() ? 'fa fa-ellipsis-v' : 'fa fa-ellipsis-v text-danger',
            $node->isPublished() ? 'nodes.unpublish' : 'nodes.publish'
        ) . '</li>
        <li>' . $this->nodeOptionForm(
            $node->isLocked() ? route('reactor.nodes.unlock', $id) : route('reactor.nodes.lock', $id),
            $node->isLocked() ? 'fa fa-ellipsis-v' : 'fa fa-ellipsis-v text-danger',
            $node->isLocked() ? 'nodes.unlock' : 'nodes.lock'
        ) . '</li>';

        $html .= '</ul>';
        $html .= '</div>';


        return $html;
    }

    /**
     * Snippet for displaying node default content options
     *
     * @param Node $node
     * @return string
     */
    public function treeNodeOptions(Node $node)
    {
        return $this->nodeOptions($node,
        '<div class="dropdown__info navigation-module__info" style="background-color:' . $node->getNodeType()->color . ';">'
            . uppercase($node->getNodeType()->label) .
        '</div>', false);
    }

    /**
     * Snippet for displaying node option forms
     *
     * @param string $action
     * @param string $icon
     * @param string $text
     * @return string
     */
    function nodeOptionForm($action, $icon, $text)
    {
        return sprintf('<form action="%s" method="POST">' .
            method_field('PUT') . csrf_field() .
            '<button type="submit" class="btn btn-link">
                <i class="%s"></i>%s
            </button></form>',
            $action, $icon, trans($text)
        );
    }

}