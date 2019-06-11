@extends('reactor.layout.base')




<!-- Main content -->
@section('content')
    <!-- Content Header (Page header) -->
    @include('partials.content_header',['title' => __('Room Type'),'breadcrumb => []'])


    <section class="content">


        <div class="row">
            <div class="col-md-9 border-right">

                {!! form_start($form) !!}

                <div class="nav-tabs-custom" style="cursor: move;">
                    <!-- Tabs within a box -->
                    <ul class="nav nav-tabs pull-right ui-sortable-handle">

                        <li>
                            <a href="#seo" data-toggle="tab" aria-expanded="false"><i
                                        class="fa fa-magnet"></i> {!! uppercase(__('SEO')) !!}</a>
                        </li>

                        <li class="active">
                            <a href="#node" data-toggle="tab" aria-expanded="true"><i
                                        class="fa fa-code-fork"></i> {!! uppercase(__('Node')) !!}</a>
                        </li>

                        <li class="pull-left header"><i class="fa fa-inbox"></i> {!! uppercase(__('Edit')) !!}</li>
                    </ul>


                    <div class="tab-content no-padding">

                        <div class="tab-pane active" id="node">
                            <div class="box-body">
                                <fieldset class="scheduler-border">
                                    <legend class="scheduler-border">Basic Information</legend>
                                <div class="row">
                                    <div class="col-md-12">
                                        {!! form_row($form->title)  !!}
                                    </div>
                                </div>

                                <div class="hidden">
                                    <div class="col-md-12">
                                        {!! form_row($form->node_name)  !!}
                                    </div>
                                </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            {!! form_row($form->description) !!}
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            {!! form_row($form->no_of_rooms) !!}
                                        </div>
                                        <div class="col-md-4">
                                            {!! form_row($form->price) !!}
                                        </div>
                                        <div class="col-md-4">
                                            {!! form_row($form->discount) !!}
                                        </div>
                                    </div>
                                </fieldset>






                                <fieldset class="scheduler-border">
                                    <legend class="scheduler-border">Facilities</legend>
                                    <div class="row">
                                     <div class="col-md-12">
                                         <div class="form-group-column form-group-column--field ">

                                             @foreach(config('site.facilities') as $facilities => $value)

                                                 <div class="checkbox-inline checkbox-small">

                                                     @if($node)
                                                         <?php
                                                         $arr = json_decode($node->facilities, true);
                                                         ?>
                                                         @if($arr)

                                                             <input type="checkbox" name="facilities[]"
                                                                    value="{!! $facilities !!}"
                                                                     {!!  (in_array($facilities, $arr) ? "checked='checked'" : "" ) !!}> {!! $value !!}

                                                         @else

                                                             <input type="checkbox" name="facilities[]"
                                                                    value="{!! $facilities !!}"
                                                             > {!! $value !!}
                                                         @endif
                                                     @else
                                                         <input type="checkbox" name="facilities[]"
                                                                value="{!! $facilities !!}"
                                                         > {!! $value !!}
                                                     @endif


                                                 </div>
                                             @endforeach

                                         </div>
                                     </div>
                                   </div>
                                </fieldset>


                            </div>

                        </div>

                        <div class="tab-pane" id="seo">
                            @include('reactor.nodes.includes.seo')
                        </div>
                        <!-- Morris chart - Sales -->

                    </div>

                    <div class="box-footer">
                        <button type="submit" class="btn btn-action btn-black">
                            <i class="fa fa-save"></i>Save
                        </button>


                    </div>

                </div>

                {!! form_end($form,false)!!}

            </div>

            <div class="col-md-3">

                @include('Site::backend.roomtype.partials.options_list',['_edit' => true])

            </div>

        </div>

    </section>
    <!-- /.content -->

@endsection