@section('scripts')
    @parent
    {!! Html::script('assets/plugins/dropzone/jquery.ezdz.min.js') !!}

    <script type="text/javascript">

        <?php if($options['attr']['value'] != '0'){?>
           <?php foreach($options['attr']['value'] as $img):?>
           $('.img<?=$img->name?>').ezdz({
            text: '<img src="<?= Url('uploads/' . $img->path)?>">',


        });

        <?php endforeach;?>
        <?php for ($i = count($options['attr']['value']); $i < trim($options['attr']['fields']) ; $i++){?>
       $('.img<?=$i?>').ezdz({
            text: 'Browse Image',

        });
        <?php }?>

           <?php }else{?>

            <?php for ($i = 0; $i < trim($options['attr']['fields']) ; $i++){?>
          $('.img<?=$i?>').ezdz({
            text: 'Browse Image',

        });
        <?php }?>
        <?php }?>

    </script>

@endsection

@section('styles')
    {!! Html::style('assets/plugins/dropzone/jquery.ezdz.css') !!}

@endsection

<div class="row">

    <?php if ($options['attr']['value'] != '0'){?>
    @foreach ($options['attr']['value'] as $img)

        <div class="col-md-4 col-xs-12">
            <div class="form-group">

                <input type="hidden" name="imgID[]" value="{!! $img->id !!}">
                <input class="img{!!$img->name!!}" type="file" name='galleries[]' accept="image/png, image/jpeg">


            </div>
        </div>
    @endforeach

    <?php for ($i = count($options['attr']['value']); $i < trim($options['attr']['fields']) ; $i++){?>
    <div class="col-md-4 col-xs-12">
        <div class="form-group">
            <input class="img<?=$i?>" type="file" name='gallery[]' accept="image/png, image/jpeg">
        </div>
    </div>
    <?php }?>


    <?php }else{?>

    <?php for ($i = 0; $i < trim($options['attr']['fields']) ; $i++){?>
    <div class="col-md-4 col-xs-12">
        <div class="form-group">

            <input class="img<?=$i?>" type="file" name='gallery[]' accept="image/png, image/jpeg">

        </div>
    </div>
    <?php }?>
    <?php }?>
</div>
