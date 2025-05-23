<!-- modal for inquiry details -->
<div class="modal fade" id="editModal" aria-hidden="true" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="btn-close position-absolute top-0 end-0 m-3" data-bs-dismiss="modal"
                    aria-label="Close"></button>
                <div class="row g-2">
                    <div class="col-lg-12">
                        <div class="review-from-wrapper">

                            <div class="page-title text-md-start text-center">
                                <h4 class="main_name">{{ translate('Inquiry Details') }}</h4>
                            </div>
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <td><strong>{{ translate('Name') }}</strong></td>
                                            <td>
                                                <div class="cus_name"></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>{{ translate('Email') }}</strong></td>
                                            <td>
                                                <div class="cus_email"></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>{{ translate('Phone') }}</strong></td>
                                            <td>
                                                <div class="cus_phone"></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><strong>{{ translate('Type') }}</strong></td>
                                            <td>
                                                <div class="type text-capitalize"></div>
                                            </td>
                                        </tr>
                                        @admin
                                        <tr>
                                            <td><strong>{{ translate('Author Name') }}</strong></td>
                                            <td>
                                                <div class="agent"></div>
                                            </td>
                                        </tr>
                                        @endadmin
                                        <tr class="visa_type">
                                            <td><strong>{{ translate('Visa Type') }}</strong></td>
                                            <td>
                                                <div class="visa_types"></div>
                                            </td>
                                        </tr>
                                        <tr class="visa_type">
                                            <td><strong>{{ translate('Country Name') }}</strong></td>
                                            <td>
                                                <div class="country"></div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <strong>{{ translate('Message') }}</strong>
                                                <div class="message"></div>
                                            </td>
                                        </tr>

                                        <tr class="visa_type">
                                            <td colspan="2">
                                                <div id="image-container"></div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
