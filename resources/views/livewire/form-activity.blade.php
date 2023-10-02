<div>
    <form action="{{ request()->url() }}" method="POST" enctype="multipart/form-data">
        @csrf

        <label for="detail">Rencana hari ini</label>
        <textarea name="detail" id="detail"
                  placeholder="@if($type == "masuk") Rencana hari ini @else Pekerjaan hari ini @endif"></textarea>
        <br>
        <label for="date">Pilih tanggal</label>
        <input type="datetime-local" name="date" id="date" placeholder="{{ now() }}">
        <br>


        <label for="dudi">Pilih DUDI</label>
        <select name="dudi" id="dudi">
            @foreach($dudis as $key => $dudi)
                <option value="{{ $dudi->id }}">{{ $key+1 }}. {{ $dudi->name }}</option>
            @endforeach
        </select>

        <br>
        <label for="image">Upload foto</label>
        <p>maksimal 1mb</p>
        <input type="file" name="image" id="image" placeholder="upload">
        <br>
        <button type="submit">Submit</button>
    </form>
</div>
