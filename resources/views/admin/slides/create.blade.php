<div class="modal fade slide-page-modal-lg" id="slidemodal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">{{ __('Slide Form') }}</h4>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <form method="POST" id="slideCreateForm" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <label for="title" class="col-md-4 col-form-label text-md-end">{{ __('Tittle') }}</label>

                            <div class="col-md-6">
                                <input id="tittle" type="text" class="form-control @error('tittle') is-invalid @enderror" name="tittle" value="{{ old('tittle') }}" required autocomplete="tittle" autofocus>

                                @error('tittle')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Caption') }}</label>

                            <div class="col-md-6">
                            <textarea id="caption" class="textarea" name="caption" placeholder="Enter Caption" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                @error('caption')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        

                        <div class="row mb-3">
                            <label for="photo" class="col-md-4 col-form-label text-md-end">{{ __('Slide image') }}</label>

                            <div class="col-md-6">
                                <input id="slide_image" type="file" class="form-control @error('slide_image') is-invalid @enderror"
                                    name="slide_image" value="" required autocomplete="slide_image" autofocus>
                                    <span class="text-danger" id="tittle_error"></span>
                                @error('slide_image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Save') }}
                                </button>
                                <button class="btn btn-warning" type="reset">Reset</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>