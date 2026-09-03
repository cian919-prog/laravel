@extends('layout.app')



@section('content')
<h1 class="mb-10  text-2xl">Add review for {{ $book->title }}</h1>
@endsection


<form method="POST" action="{{ route('books.reviews.store', $book) }}">
@csrf
<label for="review">review</label>
<textarea name="review" id="review" required class="input mb-4"></textarea>

<label for="rating"></label>
<select name="rating" id="rating" class="input" mb-4 required>
<option value=""> select an rating</option>
@for($i = 1; $i <= 5; $i++)
<option value="{{ $i }}">{{ $i }}</option>
@endfor

</select>

<button type="submit" class="btn"> add review </button>
</form>

