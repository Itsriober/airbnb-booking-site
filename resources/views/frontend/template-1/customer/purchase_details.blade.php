@extends('frontend.template-' . selectedTheme() . '.customer.partials.master')
@section('master')
    <div class="main-content">
        <div class="row mb-35 g-4">
            <div class=" col-md-3">
                <div class="page-title text-md-start text-left">
                    <h4>{{ $title }}</h4>
                </div>
            </div>
            <div
                class="col-md-9 d-flex justify-content-md-end justify-content-center flex-row align-items-center flex-wrap gap-4">

                <a href="{{ route('customer.dashboard') }}" class="btn btn-primary back-btn"> <img
                        src="{{ asset('backend/images/icons/back.svg') }}" alt="{{ translate('Go Back') }}">
                    {{ translate('Go Back') }}</a>
            </div>
        </div>
        
        <div class="row">
            <div class="col-12">
                <div class="card product-card printArea" id="printArea">
                    <div class="row">
                        <div class="col-md-6 p-12">
                            <div class="">
                                <img src="http://127.0.0.1:8000/assets/logo/p-16-1732597510.jpg" class="im-fluid w-25">
                                
                                <div class="mt-8">
                                    <span>From</span>
                                    <address>
                                        <h5><strong class="company-name">TripRex</strong></h5>
                                        <p>168/170, Ave 01,Old York Drive Rich Mirpur, Dhaka</p>
                                        <p><span>Phone:</span>
                                            +0213549826649</p>
                                        <p> <span>Email:</span>
                                            +support@example.com</p>
                                    </address>
                                </div>

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="bill-info">
                                <div class="invoice-info">
                                    <b>Invoice Number #GAKZLNF</b><br>
                                    <b>Date:</b> November 24, 2024<br>
                                    <b>Payment Method:</b>
                                    Paypal<br>
                                </div>

                                <div class="invoice-col">
                                    <span>Billing To</span>
                                    <address>
                                        <p><strong class="company-name">Robert Atik</strong>
                                        </p>
                                        <p>
                                            House#168/170, Road 02, Avenue 01, Mirpur DOHS, Phenix City, 12166, United
                                            States
                                        </p>
                                        <p><span>Phone:</span> 1234555</p>
                                        <p><span>Email:</span> customer@gmail.com</p>
                                    </address>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="row mt-3">
                            <div class="col-12 table-responsive">
                                <table class="eg-table table table-striped invoice-table">
                                    <thead>
                                        <tr>
                                            <th width="50%">Product</th>
                                            <th width="10%">Adult</th>
                                            <th width="20%">
                                                Child:</th>
                                            <th width="20%">Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td data-label="Product">
                                                Discover Serenity, Exploration, and Enlightenment.
                                            </td>
                                            <td data-label="Adult">
                                                $3200 x 4
                                            </td>
                                            <td data-label="Child">
                                                $2600 x 3
                                            </td>
                                            <td data-label="Subtotal">
                                                $20600
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td data-label="Tax" colspan="3" class="text-end">Tax
                                                (5%)</td>
                                            <td data-label="Tax">$1030</td>
                                        </tr>
                                        <tr class="total">
                                            <td data-label="Total" colspan="3" class="text-end">Total
                                            </td>
                                            <td data-label="Total"><strong>
                                                    $21630</strong></td>
                                        </tr>
                                        <tr class="Note">
                                            <td data-label="Note" colspan="4" class="text-start">
                                                <strong>Note:</strong>
                                                Thanks u so much
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row mb-25">
                <div class="col-12">
                    <button class="eg-btn btn--green" onclick="printDiv()"><i class="bi bi-printer"></i>
                        Print Invoice</button>
                    <button class="eg-btn btn--primary" onclick="createPDF('GAKZLNF')">
                        Download Invoice</button>
                </div>
            </div>

        </div>
    </div>
@endsection
