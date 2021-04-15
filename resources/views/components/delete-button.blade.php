<form class="button-form" action="{{$deleteRoute ?? ''}}" method="POST">
    @csrf
    @method('DELETE')
    <button style="font-size: 1.4em;" type="submit">&#128465;</button>
</form>