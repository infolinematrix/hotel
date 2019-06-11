@extends('partials.modals.base')

<?php $modalButtons = '<button class="btn button--close">' .
        uppercase(trans('general.dismiss')) .
        '</button>
<button class="btn button--emphasis button--confirm">' .
        uppercase(trans('general.confirm')) .
        '</button>'; ?>