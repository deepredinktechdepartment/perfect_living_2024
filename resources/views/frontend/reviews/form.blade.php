<form action="{{ route('reviews.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="star_rating">Star Rating</label>
        <select name="star_rating" id="star_rating" class="form-control">
            <option value="1">1 Star</option>
            <option value="2">2 Stars</option>
            <option value="3">3 Stars</option>
            <option value="4">4 Stars</option>
            <option value="5">5 Stars</option>
        </select>
    </div>

    <div class="form-group">
        <label for="review">Review</label>
        <textarea name="review" id="review" class="form-control" rows="5"></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Submit Review</button>
</form>
