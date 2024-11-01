<form id="searchForm" method="GET">
    <div class="row px-2 py-2 mb-3 bg-grey align-items-center">
        <div class="col-lg-2 col-6 px-1 py-1">
            <select class="form-select" id="beds" name="beds" aria-label="BHK">
                <option value="" selected>BHK</option>
                <option value="2" {{ request()->query('beds') == '2' ? 'selected' : '' }}>2 BHK</option>
                <option value="2.5" {{ request()->query('beds') == '2.5' ? 'selected' : '' }}>2.5 BHK</option>
                <option value="3" {{ request()->query('beds') == '3' ? 'selected' : '' }}>3 BHK</option>
                <option value="4" {{ request()->query('beds') == '4' ? 'selected' : '' }}>4 BHK</option>
                <option value="5" {{ request()->query('beds') == '5' ? 'selected' : '' }}>5 BHK</option>
            </select>
        </div>


        <div class="col-lg-2 col-6 px-1 py-1">
            <select class="form-select" id="propertyType" name="propertytype" aria-label="Property Type">
                <option value="" selected>Property Type</option>
                <option value="Gated Community Apartments" {{ request()->query('propertytype') == 'Gated Community Apartments' ? 'selected' : '' }}>Gated Community Apartments</option>
                <option value="Retail Space" {{ request()->query('propertytype') == 'Retail Space' ? 'selected' : '' }}>Retail Space</option>
                <option value="Commercial Space" {{ request()->query('propertytype') == 'Commercial Space' ? 'selected' : '' }}>Commercial Space</option>
                <option value="Standalone Villa" {{ request()->query('propertytype') == 'Standalone Villa' ? 'selected' : '' }}>Standalone Villa</option>
                <option value="Standalone Apartment" {{ request()->query('propertytype') == 'Standalone Apartment' ? 'selected' : '' }}>Standalone Apartment</option>
                <option value="Villa Gated Community" {{ request()->query('propertytype') == 'Villa Gated Community' ? 'selected' : '' }}>Villa Gated Community</option>
                
                
            </select>
        </div>
        <div class="col-lg-3 col-6 px-1 py-1">
            <select class="form-select" id="budget" name="budgets" aria-label="Budget">
                <option value="" selected>Budget</option>
                <option value="1-1.5" {{ request()->query('budgets') == '1-1.5' ? 'selected' : '' }}>Under 1.5 Cr</option>
                <option value="1.5-2" {{ request()->query('budgets') == '1.5-2' ? 'selected' : '' }}>1.5 Cr &amp; 2 Cr</option>
                <option value="2-2.5" {{ request()->query('budgets') == '2-2.5' ? 'selected' : '' }}>2 Cr & 2.5 Cr</option>
                <option value="2.5-4" {{ request()->query('budgets') == '2.5-4' ? 'selected' : '' }}>2.5 Cr & 4 Cr</option>
                <option value="4-6" {{ request()->query('budgets') == '4-6' ? 'selected' : '' }}>4 & 6 Cr</option>
            </select>
        </div>

        <div class="col-lg-2 col-6 px-1 py-1">
            <div class="d-flex align-items-center gap-3">
                <button class="btn btn_black search_btn pe-2" type="submit">Search</button>
                <a href="{{ URL::to('search/') }}" class="text-danger text-decoration-none clear_all">Clear all</a>
            </div>
        </div>
    </div>
</form>
