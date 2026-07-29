<div class="modal fade picture-modal-lg" id="photomodal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">{{ __('Update picture Form') }}</h4>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <form method="POST" id="pictureUpdateForm" enctype="multipart/form-data">
                        @csrf
                        
                        <input type="hidden" id="pictureId" name="pictureId">
                        <div class="row mb-3">
                            <label for="pictureName" class="col-md-4 col-form-label text-md-end">{{ __('Pictue Name') }}</label>

                            <div class="col-md-6">
                                <input type="text" id="pictureNamee" name="pictureNamee" class="form-control @error('pictureNamee') is-invalid @enderror" value="{{ old('pictureNamee') }}" required autocomplete="pictureNamee" autofocus>

                                @error('pictureNamee')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="photo" class="col-md-4 col-form-label text-md-end">{{ __('Picture') }}</label>

                            <div class="col-md-6">
                                <input type="file" id="picturee" name="picturee" class="form-control @error('picturee') is-invalid @enderror"
                                    value="" autocomplete="picturee" autofocus>

                                @error('picturee')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="position" class="col-md-4 col-form-label text-md-end">{{ __('Position') }}</label>
                            <div class="col-md-6">
                                <select class="form-control" name="positionn" id="positionn">
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

                        <div class="row mb-3">
                            <label for="status" class="col-md-4 col-form-label text-md-end">{{ __('Service Status') }}</label>
                            <div class="col-md-6">
                                <select class="form-control" name="status" id="status">
                                    <option value="" hidden>{{ __('Select Status')}}</option>
                                    <option value="1">{{ __('Active')}}</option>
                                    <option value="0">{{ __('In Active')}}</option>
                                </select>
                                @error('status')
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