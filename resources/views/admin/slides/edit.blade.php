<div class="modal fade slide-modal-lg" id="slidemodal1" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">{{ __('Update Slide Info') }}</h4>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <form method="POST" id="updateSlideForm" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" id="slideid" name="slideid">
                        <div class="row mb-3">
                            <label for="title" class="col-md-4 col-form-label text-md-end">{{ __('Tittle') }}</label>

                            <div class="col-md-6">
                                <input id="tittlee" name="tittlee" type="text" class="form-control @error('tittlee') is-invalid @enderror" value="{{ old('tittlee') }}" required autocomplete="tittlee" autofocus>

                                @error('tittlee')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="caption" class="col-md-4 col-form-label text-md-end">{{ __('Caption') }}</label>

                            <div class="col-md-6">
                                <textarea id="captionn" name="captionn" class="textarea" placeholder="Enter Caption" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                @error('captionn')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="photo" class="col-md-4 col-form-label text-md-end">{{ __('Slide image') }}</label>

                            <div class="col-md-6">
                                <input type="file" id="slide_imagee" name="slide_imagee" class="form-control @error('slide_imagee') is-invalid @enderror"
                                     value="" autocomplete="slide_imagee" autofocus>

                                @error('slide_imagee')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="slide_status" class="col-md-4 col-form-label text-md-end">{{ __('Status') }}</label>
                            <div class="col-md-6">
                                <select class="form-control" name="statuss" id="statuss">
                                    <option value="" hidden>{{ __('Select Status')}}</option>
                                    <option value="1">{{ __('Active')}}</option>
                                    <option value="0">{{ __('In Active')}}</option>
                                </select>
                                @error('statuss')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>