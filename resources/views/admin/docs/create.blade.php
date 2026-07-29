<div class="modal fade docs-page-modal-lg" id="docsmodal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">{{ __('Upload docs Form') }}</h4>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <form method="POST" id="documentCreateForm" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <label for="fileName" class="col-md-4 col-form-label text-md-end">{{ __('File Name') }}</label>

                            <div class="col-md-6">
                                <input type="text" id="fileName" name="fileName" class="form-control @error('fileName') is-invalid @enderror" value="{{ old('fileName') }}" required autocomplete="fileName" autofocus>

                                @error('fileName')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="photo" class="col-md-4 col-form-label text-md-end">{{ __('File Upload') }}</label>

                            <div class="col-md-6">
                                <input type="file" id="document" name="document" class="form-control @error('document') is-invalid @enderror"
                                    value="" required autocomplete="document" autofocus>

                                @error('document')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="slide_status" class="col-md-4 col-form-label text-md-end">{{ __('Department') }}</label>
                            <div class="col-md-6">
                                <select class="form-control" name="departmentName" id="departmentName">
                                    <option value="" hidden>{{ __('Select Department')}}</option>
                                    <option value="utumishi">{{ __('Uendeshaji & Utumishi')}}</option>
                                    <option value="uratibu">{{ __('Uratibu Tawala za Mikoa')}}</option>
                                    <option value="mipango">{{ __('Sera & Mipango')}}</option>
                                    <option value="idara maalum">{{ __('Idara Maalum')}}</option>
                                    <option value="mrajis">{{ __('Mrajis')}}</option>
                                </select>
                                @error('departmentName')
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