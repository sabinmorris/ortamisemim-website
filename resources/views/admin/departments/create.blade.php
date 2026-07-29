<div class="modal fade department-page-modal-lg" id="postmodal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">{{ __('Department Role Form') }}</h4>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <form method="POST" id="departmentCreateForm" enctype="multipart/form-data">
                        @csrf

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
                                    <option value="general">{{ __('General')}}</option>
                                </select>
                                @error('departmentName')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="service" class="col-md-4 col-form-label text-md-end">{{ __('Service') }}</label>

                            <div class="col-md-6">
                            <textarea id="service" name="service" class="textarea" placeholder="Enter Description" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                @error('service')
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