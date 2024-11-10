@extends('dashboard.layout.master')
@section('content')
<section id="content">
    <div class="container">
        <div class="block-header">
            <h2 style="text-align:left;">Settings</h2> 

            <ul class="actions">
                <li>
                    <a href="#">
                        <i class="md md-trending-up"></i>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="md md-done-all"></i>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="#" data-toggle="dropdown">
                        <i class="md md-more-vert"></i>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-right">
                        <li>
                            <a href="#">Refresh</a>
                        </li>
                        <li>
                            <a href="#">Manage Widgets</a>
                        </li>
                        <li>
                            <a href="#">Widgets Settings</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>

        <div class="card">
            <div class="card-header">
                <h2 class="product-list">Qrcode Settings</h2> 
            </div>

            <div class="card-body">
                <!-- Checkbox Form -->
                <form method="POST" action="{{url('update_settings') }}">
                    @csrf
        
    <input type="hidden" name="id" value="{{ $settings['id'] }}">
    
    <div class="checkboxes">
    <label>
        <input type="checkbox" name="qrcode" {{ $settings['qrcode'] === 'on' ? 'checked' : '' }} class="setting-checkbox" data-setting="qrcode">
        QR Code
    </label><br>

    <label>
        <input type="checkbox" name="company_name" {{ $settings['company_name'] === 'on' ? 'checked' : '' }} class="setting-checkbox" data-setting="company_name">
        Company Name
    </label><br>

    <label>
        <input type="checkbox" name="tax" {{ $settings['tax'] === 'on' ? 'checked' : '' }} class="setting-checkbox" data-setting="tax">
        Tax
    </label><br>

    <label>
        <input type="checkbox" name="customer_name" {{ $settings['customer_name'] === 'on' ? 'checked' : '' }} class="setting-checkbox" data-setting="customer_name">
        Customer Name
    </label><br>

    <label>
        <input type="checkbox" name="sub_total" {{ $settings['sub_total'] === 'on' ? 'checked' : '' }} class="setting-checkbox" data-setting="sub_total">
        Sub Total
    </label>
</div>

    <button type="submit" class="btn btn-primary">Save Settings</button>
</form>

            </div>
        </div>
    </div>
</section>


<script>
    $(document).ready(function() {
        $('.setting-checkbox').change(function() {
            const settingName = $(this).data('setting');
            const value = $(this).is(':checked') ? 'enable' : 'disable';

        });
    });
</script>
@endsection
