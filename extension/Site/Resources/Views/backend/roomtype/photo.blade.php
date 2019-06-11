@extends('reactor.layout.base')

@section('styles')
    {!! Html::style('assets/plugins/dropzone/focus.css') !!}
@endsection
@section('scripts')

    @parent
    <script>

        <?php if(count($images) != 0){?>
         <?php foreach($images as $photo):?>
         $('.img<?='ph'.$photo->id ?>').ezdz({
            text: '<img src="{!! asset('/uploads/'.$photo->path) !!}">'
        });
        <?php endforeach;?>
        <?php for ($i = count($images); $i < 5 ; $i++){?>
          $('.img<?=$i?>').ezdz({
            text: 'Select Photo'
        });
        <?php }?>
        <?php }else{?>

         <?php for ($i = 0; $i < 5 ; $i++){?>
          $('.img<?=$i?>').ezdz({
            text: 'Select Photo'
        });
        <?php }?>
        <?php }?>

    </script>
@endsection

<!-- Main content -->
@section('content')
    <!-- Content Header (Page header) -->
    @include('partials.content_header',['title' => __('Room Type'),'breadcrumb => []'])


    <section class="content">
        <div class="nav-tabs-custom" style="cursor: move;">
            <!-- Tabs within a box -->


            <ul class="nav nav-tabs pull-right ui-sortable-handle">
                <li class="active">
                    <a href="#daily" data-toggle="tab" aria-expanded="true" data-mode="daily">
                        {!! __('Update Room Type') !!}
                    </a>
                </li>
            </ul>


            <div class="tab-content">

                {!! Form::open(['files' => true,'url' => route('reactor.roomtype.upload.photo')]) !!}
                {!! Form::hidden('node_id',$node->getKey()) !!}

                <div class="tab-pane active" id="daily">

                    <div class="row">
                        <div class="col-md-12 col-xs-12">
                            <fieldset class="scheduler-border">
                                <legend class="scheduler-border">Photos</legend>
                                @if(count($images) != 0)

                                    @foreach($images as $photo)
                                        <div class="col-md-4" style="margin-top: 10px">
                                            <div class="gallery">
                                                <div class="picture">
                                                    <div class="form-group">
                                                        <input class="img{!! 'ph'.$photo->id !!}" id="photo"
                                                               name="imagess[]" type="file">
                                                        <input type="hidden" name="picID[]" value="{!! $photo->id !!}">
                                                    </div>
                                                    <div class="actions" >
                                                        <div class="" style="margin-top: 5px">
                                                            <a class="pull-right btn btn-danger btn-xs" href="{!! route('reactor.roomtype.photo.delete',$photo->id) !!}"> Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                    <?php for ($i = count($images); $i < 5 ; $i++){?>
                                    <div class="col-md-4" style="margin-top: 10px">
                                        <div class="form-group">
                                            <input class="img<?=$i?>" id="photo"
                                                   name="images[]" type="file">
                                        </div>
                                    </div>
                                    <?php }?>

                                @endif
                                @if(count($images) == 0)
                                    <?php for ($i = 0; $i < 5 ; $i++){?>
                                    <div class="col-md-4 mb20" style="margin-top: 10px">
                                        <div class="form-group">
                                            <input class="img<?=$i?>" id="photo"
                                                   name="images[]" type="file">
                                        </div>
                                    </div>
                                    <?php }?>
                                @endif
                            </fieldset>
                        </div>

                    </div>


                </div>

                <button class="btn btn-primary">Save</button>
                <a href="{!! route('reactor.roomtype.edit',[$node->getKey(),$node->translate(locale())->getKey()]) !!}" class="btn btn-info">Back</a>
                {!! Form::close() !!}
            </div>


        </div>
    </section>
    <!-- /.content -->

@endsection