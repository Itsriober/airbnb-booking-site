 <!-- Modal -->
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                            
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">{{ translate('Add Transport Term') }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <form action="{{route('transports.attribute.terms.store',$attribute_id)}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                            <div class="modal-body">
                                    <div class="form-inner mb-35">
                                        <label>{{ translate('Attribute Term Name') }} <span class="text-danger">*</span></label>
                                        <input type="text" name="name" id="attribute_name" value="{{old('name')}}" class="username-input" placeholder="{{ translate('Enter Attribute Term Name') }}" required>
                                        @error('name')
                                            <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-inner mb-25">
                                        <label>{{ translate('Class Icon - get icon in') }}</label>
                                        <input type="text" name="icon" class="icon icon-picker" placeholder="Ex: bi bi-facebook">
                                        @error('icon')
                                            <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <div class="form-inner mb-25">
                                        <label>{{ translate('Image') }}</label>
                                        <input type="file" name="image" class="password" accept="image/*">
                                        @error('image')
                                            <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                            </div>
                            <div class="modal-footer border-white">
                                <button type="button" class="eg-btn btn--red py-1 px-3 rounded" data-bs-dismiss="modal">{{ translate('Close') }}</button>
                                <button type="submit" class="eg-btn btn--primary py-1 px-3 rounded">{{ translate('Save') }}</button>
                            </div>
                            </form>
                            </div>
                        </div>
                    </div>