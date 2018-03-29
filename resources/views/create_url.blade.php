@extends('layouts.app')

@section('post-scripts')
    @if(isset($url))
        <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.0/clipboard.min.js"></script>
        <script>
            var clipboard = new ClipboardJS('#copy-button');

            $(function () {
                $('[data-toggle="tooltip"]').tooltip();
            });

            $('#copy-button').tooltip('disable');

            clipboard.on('success', function(e) {
                console.info(e.action, e.text);

                $('#copy-button').tooltip('enable').tooltip('show').tooltip('disable');
            });
        </script>
    @else
        <script>
            $("#inputHost").on('input', function() {
                $(this).val(function (i, val) {
                    if(val.substr(0, 7) === "http://") {
                        $("#inputProtocol").val("http://")
                    }

                    if(val.substr(0, 8) === "https://") {
                        $("#inputProtocol").val("https://");
                    }

                    return val.replace(/^https?:\/\//, '');
                })
            });
        </script>
    @endif
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <h5 class="card-header">Shorten URL</h5>
                    <div class="card-body">

                        @if(isset($url))
                            <p>Your URL has been successfully shortened.</p>

                            <div class="input-group mb-3">
                                <input type="text" id="copy-data" class="form-control form-control-lg" placeholder="Shortened URL" aria-label="Shortened" aria-describedby="basic-addon2" value="{{ route('url.redirect', ['url' => $url]) }}" readonly="readonly">
                                <div class="input-group-append">
                                    <button class="btn btn-secondary btn-lg" id="copy-button" type="button" data-toggle="tooltip" data-placement="top" title="Copied!" data-clipboard-target="#copy-data">Copy</button>
                                </div>
                            </div>
                        @else
                            <p>You can take a long URL and generate a shorter, easier to remember link using the form below.</p>

                            <form method="post">
                                {{ csrf_field() }}

                                <div class="form-row">
                                    <div class="col-xl">
                                        <div class="form-row">
                                            <div class="form-group col-sm-4">
                                                <select name="protocol" id="inputProtocol" class="form-control form-control-lg {{ $errors->has('full_url') ? 'is-invalid' : '' }}">
                                                    <option {{ old('protocol') == "http://" ? 'selected' : '' }}>http://</option>
                                                    <option {{ old('protocol') == "https://" ? 'selected' : '' }}>https://</option>
                                                </select>
                                            </div>
                                            <div class="form-group col-sm-8">
                                                <input type="text" class="form-control form-control-lg target {{ $errors->has('full_url') ? 'is-invalid' : '' }}" name="host" id="inputHost" value="{{ old('host') }}" required>
                                                @if ($errors->has('full_url'))
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('full_url') }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-xl-2">
                                        <input class="btn btn-primary btn-lg btn-block" type="submit" value="Shorten">
                                    </div>
                                </div>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
