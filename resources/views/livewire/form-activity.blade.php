<div>
    <form action="{{ request()->url() }}" method="POST" enctype="multipart/form-data">
        <label for="detail">Rencana hari ini</label>
        <input type="text" name="detail" id="detail" placeholder="Rencana hari ini">
        <br>
        <label for="date">Pilih tanggal</label>
        <input type="datetime-local" name="date" id="date">
        <br>
        <label for="dudi">Pilih DUDI</label>
        <select name="DUDI" id="DUDI">
            <option value="1">DUDI1</option>
        </select>
        <br>
        <label for="image">Upload foto</label>
        <p>maksimal 1mb</p>
        <input type="file" name="image" id="image" placeholder="upload">
        <br>
        <button type="submit">Submit</button>
    </form>
</div>
