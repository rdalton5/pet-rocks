<form method="POST" action="{{$formAction}}">
    @if ($formMethod == "PUT")
        @method('PUT')
    @endif
    <div>
        <label for="name">Name:</label>
        <br>
        <input required type="text" id="name" name="name" value="{{$petRock->name ?? ''}}">

    </div>
    <div>
        <label for="size">Size:</label>
        <br>
        <select name="size" id="size">
            <option value="small">Small</option>
            <option value="medium">Medium</option>
            <option value="big">Big</option>
        </select>
    </div>
    <div>
        <label for="bio">Bio:</label>
        <br>
        <textarea required id="bio" name="bio">{{$petRock->bio ?? ''}}</textarea>
    </div>
    <br>
    <input type="submit" value="Submit">
</form> 