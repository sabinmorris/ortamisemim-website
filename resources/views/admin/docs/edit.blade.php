<div class="modal fade docs-modal-lg" id="docsmodal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">{{ __('Update docs Form') }}</h4>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <form method="POST" id="documentUpdateForm" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" id="docId" name="docId">
                        <div class="row mb-3">
                            <label for="fileName" class="col-md-4 col-form-label text-md-end">{{ __('File Name') }}</label>

                            <div class="col-md-6">
                                <input type="text" id="fileNamee" name="fileNamee" class="form-control @error('fileNamee') is-invalid @enderror" value="{{ old('fileNamee') }}" required autocomplete="fileNamee" autofocus>

                                @error('fileNamee')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="photo" class="col-md-4 col-form-label text-md-end">{{ __('File Upload') }}</label>

                            <div class="col-md-6">
                                <input type="file" id="documentt" name="documentt" class="form-control @error('documentt') is-invalid @enderror"
                                    value="" autocomplete="documentt" autofocus>

                                @error('documentt')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="slide_status" class="col-md-4 col-form-label text-md-end">{{ __('Department') }}</label>
                            <div class="col-md-6">
                                <select class="form-control" name="departmentNamee" id="departmentNamee">
                                    <option value="" hidden>{{ __('Select Department')}}</option>
                                    <option value="utumishi">{{ __('Uendeshaji & Utumishi')}}</option>
                                    <option value="uratibu">{{ __('Uratibu Tawala za Mikoa')}}</option>
                                    <option value="mipango">{{ __('Sera & Mipango')}}</option>
                                    <option value="idara maalum">{{ __('Idara Maalum')}}</option>
                                    <option value="mrajis">{{ __('Mrajis')}}</option>
                                </select>
                                @error('departmentNamee')
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