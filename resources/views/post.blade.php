Create post <br> <br>
<form action="/create-post" method="POST">
    @csrf
    <input type="text" name="title" placeholder="Title"> <br> <br>
    <textarea name="content" cols="30" rows="10">Content</textarea> <br> <br>

    <select name="categories[]" multiple>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select> <br> <br>


    {{-- <input type="text" name="tags" placeholder="Enter tags"> <br> <br> --}}

    <input type="submit">

</form>