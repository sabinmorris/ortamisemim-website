<div class="modal fade picture-page-modal-lg" id="photomodal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">{{ __('Upload picture Form') }}</h4>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <form method="POST" id="pictureCreateForm" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <label for="pictureName" class="col-md-4 col-form-label text-md-end">{{ __('Pictue Name') }}</label>

                            <div class="col-md-6">
                                <input type="text" id="pictureName" name="pictureName" class="form-control @error('pictureName') is-invalid @enderror" value="{{ old('pictureName') }}" required autocomplete="pictureName" autofocus>

                                @error('pictureName')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="photo" class="col-md-4 col-form-label text-md-end">{{ __('Picture') }}</label>

                            <div class="col-md-6">
                                <input type="file" id="picture" name="picture" class="form-control @error('picture') is-invalid @enderror"
                                    value="" required autocomplete="picture" autofocus>

                                @error('picture')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="position" class="col-md-4 col-form-label text-md-end">{{ __('Position') }}</label>
                            <div class="col-md-6">
                                <select class="form-control" name="position" id="position">
                                    <option value="" hidden>{{ __('Select Position')}}</option>
                                    <option value="left">{{ __('Left')}}</option>
                                    <option value="right">{{ __('Right')}}</option>
                                    <option value="top">{{ __('Top')}}</option>
                                    <option value="down">{{ __('Down')}}</option>
                                </select>
                                @error('position')
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