<div class="modal fade leader-modal-lg" id="leadermodal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">{{ __('Leadership Update Form') }}</h4>
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="card-body">
                    <form method="POST" id="leaderUpdateForm" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" id="leaderId" name="leaderId">
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Leader-Name') }}</label>

                            <div class="col-md-6">
                                <input type="text" id="namee" name="namee" class="form-control @error('namee') is-invalid @enderror" value="{{ old('namee') }}" required autocomplete="namee" autofocus>

                                @error('namee')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="role" class="col-md-4 col-form-label text-md-end">{{ __('Role') }}</label>
                            <div class="col-md-6">
                                <select class="form-control" name="rolee" id="rolee">
                                    <option value="" hidden>{{ __('Select Role')}}</option>
                                    <option value="waziri">{{ __('Waziri')}}</option>
                                    <option value="katibu">{{ __('Katibu')}}</option>
                                    <option value="naibu">{{ __('Naibu Katibu')}}</option>
                                    <option value="mwenyekiti">{{ __('Mwenyekiti wa Tume')}}</option>
                                    <option value="katibu-tume">{{ __('Katibu Tume Idara Maalum')}}</option>
                                    <option value="mk-utmishi">{{ __('Mk/Utumishi')}}</option>
                                    <option value="mk-mipango">{{ __('Mku/Mipango')}}</option>
                                    <option value="mk-uratibu">{{ __('Mk/Uratibu')}}</option>
                                    <option value="mratibu">{{ __('Mratibu Idara Maalum')}}</option>
                                    <option value="m-mkoa-mjini">{{ __('M/Mkoa Mjini')}}</option>
                                    <option value="m-mkoa-kusini-unguja">{{ __('M/Mkoa Kusini Unguja')}}</option>
                                    <option value="m-mkoa-kaskazini-unguja">{{ __('M/Mkoa Kaskazini Unguja')}}</option>
                                    <option value="m-mkoa-kusini-pemba">{{ __('M/Mkoa kusini Pemba')}}</option>
                                    <option value="m-mkoa-kaskazini-pemba">{{ __('M/Mkoa kaskazini Pemba')}}</option>
                                    <option value="m-kikosi-kmkm">{{ __('M/Kikosi Kmkm')}}</option>
                                    <option value="m-kikosi-jku">{{ __('M/Kikosi Jku')}}</option>
                                    <option value="m-kikosi-kvz">{{ __('M/Kikosi Kvz')}}</option>
                                    <option value="m-kokosi-mafunzo">{{ __('M/Kikosi Mafunzo')}}</option>
                                    <option value="m-kikosi-faya">{{ __('M/kikosi zimamoto')}}</option>
                                    <option value="m-wilaya-mjini">{{ __('M/Wilaya ya Mjini')}}</option>
                                    <option value="m-wilaya-magharib-a">{{ __('M/Wilaya ya Magharib-A')}}</option>
                                    <option value="m-wilaya-magharib-b">{{ __('M/Wilaya ya Magharib-B')}}</option>
                                    <option value="m-wilaya-kati">{{ __('M/wilaya ya Kati')}}</option>
                                    <option value="m-wilaya-kusini-unguja">{{ __('M/Wilaya ya Kusini Unguja')}}</option>
                                    <option value="m-wilaya-kaskazini-unguja">{{ __('M/Wilaya Kaskazini Unguja')}}</option>
                                    <option value="m-wilaya-chakechake">{{ __('M/Wilaya Chakechake')}}</option>

                                </select>
                                @error('rolee')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="designation" class="col-md-4 col-form-label text-md-end">{{ __('Designation') }}</label>

                            <div class="col-md-6">
                                <input type="text" id="designationn" name="designationn" class="form-control @error('designationn') is-invalid @enderror" value="{{ old('designationn') }}" required autocomplete="designation" autofocus>

                                @error('designationn')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <textarea id="descriptionn" name="descriptionn" class="textarea" placeholder="Enter Description" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                @error('descriptionn')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="photo" class="col-md-4 col-form-label text-md-end">{{ __('Leader image') }}</label>

                            <div class="col-md-6">
                                <input type="file" id="leader_imagee" name="leader_imagee" class="form-control @error('leader_imagee') is-invalid @enderror"
                                    value="" autocomplete="leader_imagee" autofocus>

                                @error('leader_imagee')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="slide_status" class="col-md-4 col-form-label text-md-end">{{ __('Status') }}</label>
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