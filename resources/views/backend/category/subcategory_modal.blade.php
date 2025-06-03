 <!-- Modal -->
                    <div class="modal fade" id="subcategoryBackdrop" data-bs-backdrop="subcategory" data-bs-keyboard="false" tabindex="-1" aria-labelledby="subcategoryBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                            
                            <div class="modal-header">
                                <h5 class="modal-title" id="subcategoryBackdropLabel">{{ translate('Add New Sub Category') }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <form action="{{route('category.store')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                            <div class="modal-body">
                                    <div class="form-inner mb-35">
                                        <label>{{ translate('Name') }}*</label>
                                        <input type="text" name="name" id="category_name" value="{{old('name')}}" class="username-input" placeholder="{{ translate('Enter Name') }}" required>
                                        @error('name')
                                            <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-inner mb-35">
                                        <label>{{ translate('Category') }}*</label>
                                        <select class="js-example-basic-single" name="parent_id">
                                            <option value="">Select Category</option>
                                            @foreach($parent_categories as $pcat)
                                            <option value="{{$pcat->id}}" {{ old('parent_id') == $pcat->id ? 'selected' : '' }}>{{$pcat->name}}</option>
                                            @if($pcat->child)
                                            @foreach($pcat->child as $child)
                                            <option value="{{$child->id}}" {{ old('parent_id') == $child->id ? 'selected' : '' }}>--{{$child->name}}</option>
                                            @if($child->child)
                                            @foreach($child->child as $child2)
                                            <option value="{{$child2->id}}" {{ old('parent_id') == $child2->id ? 'selected' : '' }}>----{{$child2->name}}</option>
                                            @endforeach
                                            @endif
                                            @endforeach
                                            @endif
                                            @endforeach
                                        </select>
                                        @error('parent_id')
                                            <div class="error text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-inner mb-25">
                                        <label>{{ translate('Image') }}*</label>
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