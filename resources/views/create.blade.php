<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
    <strong>Country:</strong>
        <select name="country" id="country" class="form-control mb-1">
            <option value="">Select Country</option>
            @foreach ($countries as $country)
                <option value="{{ $country }}">{{ $country }}</option>
            @endforeach
        </select>
    </div>     
    <div class="form-group">
        <strong>State:</strong>
        <select name="state" id="state" class="form-control mb-1">
            <option value="">Select State</option>
            @foreach ($states as $state)
                <option value="{{ $state }}">{{ $state }}</option>
            @endforeach
        </select>
    </div>
</div>