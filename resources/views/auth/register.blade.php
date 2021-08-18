<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ config('app.name') }} | Página de registro</title>

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
          integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog=="
          crossorigin="anonymous"/>

    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    {!! RecaptchaV3::initJs() !!}

</head>
<body class="hold-transition register-page">
<div class="register-box">
    <div class="register-logo">
        <a href="{{ url('/home') }}"><b>{{ config('app.name') }}</b></a>
    </div>

    <div class="card">
        <div class="card-body register-card-body">
            <p class="login-box-msg">Registrar novo usuário</p>

            <form method="post" action="{{ route('register') }}">
                @csrf

                <div class="input-group mb-3">
                    <input type="text"
                           name="name"
                           class="form-control @error('name') is-invalid @enderror"
                           value="{{ old('name') }}"
                           placeholder="Nome completo">
                    <div class="input-group-append">
                        <div class="input-group-text"><span class="fas fa-user"></span></div>
                    </div>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="input-group mb-3">
                    <input type="email"
                           name="email"
                           value="{{ old('email') }}"
                           class="form-control @error('email') is-invalid @enderror"
                           placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text"><span class="fas fa-envelope"></span></div>
                    </div>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="input-group mb-3">
                    <input type="password"
                           name="password"
                           class="form-control @error('password') is-invalid @enderror"
                           placeholder="Senha">
                    <div class="input-group-append">
                        <div class="input-group-text"><span class="fas fa-lock"></span></div>
                    </div>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="input-group mb-3">
                    <input type="password"
                           name="password_confirmation"
                           class="form-control"
                           placeholder="Repita a senha">
                    <div class="input-group-append">
                        <div class="input-group-text"><span class="fas fa-lock"></span></div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="termos" name="termos"  value="1" class=" @error('termos') is-invalid @enderror">
                            <label for="termos">
                                Eu concordo com os <a href="#"  data-toggle="modal" data-target="#modalTermos">termos</a>
                            </label>
                            @error('termos')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Registrar</button>
                    </div>
                    <!-- /.col -->
                </div>
                {!! RecaptchaV3::field('register') !!}
            </form>

            <a href="{{ route('login') }}" class="text-center">Já tenho um registro</a>
        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->

    <!-- /.form-box -->
</div>
<!-- /.register-box -->
<!-- Modal -->
<div class="modal fade" id="modalTermos" tabindex="-1" role="dialog" aria-labelledby="modalTermosTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalTermosTitle">Termos de uso</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur nec pharetra velit. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. In quis vehicula nisi. Suspendisse elementum malesuada luctus. Donec mollis id purus in mollis. Aliquam feugiat, arcu imperdiet pretium luctus, arcu purus feugiat velit, et dapibus nisi magna non magna. Aliquam quis quam nec odio finibus volutpat nec sed velit. Morbi tristique iaculis sem vitae suscipit. In at eros eget urna lobortis fringilla.

Phasellus id consectetur nisi, quis pulvinar massa. Fusce non ultricies enim. Aenean pellentesque viverra nunc, a molestie felis rutrum at. Aliquam id congue erat, et tincidunt lacus. Pellentesque tempus fermentum sollicitudin. Ut gravida, mi eu facilisis dignissim, lorem ipsum gravida nibh, et condimentum leo mauris eget nisi. Phasellus tincidunt erat ac tortor porta facilisis. Duis justo dui, sollicitudin non ex eu, rutrum hendrerit lorem.

Vivamus nec nisi nisl. Aliquam bibendum vulputate lectus, dictum vehicula nunc molestie quis. Maecenas vitae purus scelerisque, lacinia arcu in, egestas lectus. Nam aliquet nec arcu et aliquam. In accumsan id tellus eu ultrices. Donec mattis tortor pretium felis pharetra, non convallis ante blandit. Etiam at nisi tellus. Nulla egestas blandit cursus. Aliquam suscipit ex id nunc aliquam, sed varius ipsum euismod. Fusce sit amet aliquet quam, non aliquet elit.

Nulla maximus a leo ut dictum. Sed rutrum ornare mi at sollicitudin. Pellentesque a pellentesque justo. Praesent interdum turpis ut est lacinia facilisis. Integer ex nunc, porta non fermentum id, mollis et ipsum. Ut facilisis, urna nec laoreet vehicula, sapien libero auctor dolor, vitae accumsan arcu felis sit amet velit. Fusce a consequat velit, vel faucibus urna. Ut dictum turpis vel nisi laoreet iaculis. Aenean dignissim magna in ex hendrerit viverra. Cras id massa sodales, rutrum nibh quis, congue diam. Aenean ut quam bibendum elit tempor consequat elementum ac tortor.

Nullam scelerisque augue mi, quis dapibus diam eleifend ac. Nulla vehicula a lorem ac rutrum. Praesent eu nibh sapien. Proin vel est vitae ligula gravida imperdiet bibendum id metus. Phasellus pulvinar augue nec ante volutpat consectetur. Aliquam hendrerit congue sapien, a faucibus tellus dictum eu. Morbi luctus porttitor molestie. Vivamus dapibus libero elit, quis varius libero placerat nec.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>
<script src="{{ mix('js/app.js') }}" defer></script>


</body>
</html>
