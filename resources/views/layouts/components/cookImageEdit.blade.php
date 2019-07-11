@if ($cook->images)
@foreach ($cook->images as $image)
<div class="fileGroup-{{$loop->index + 1}}">
    <div id="upArea-{{$loop->index + 1}}" class="upArea">
        <img src="{{asset('/storage/cook_image/'.$image->image)}}" alt="thumbnail" class="upImg img-raised">
        <div id="deleteBtn-{{ $image->id }}" class="deleteBtn btn btn-sm btn-primary">
            <i class="fas fa-times"></i>
        </div>
    </div>
    <script>
        document.getElementById('deleteBtn-{{ $image->id }}').addEventListener('click', e => {
            axios.delete('/jsonFileDelete/{{ $image->id }}')
                .then(res => {
                  document.getElementById('fileArea').innerHTML = res.data;
                  console.log(e);
                })
                .catch(e => {
                    console.log(e);
                });
        });
    </script>
    <!-- <div id="file-btn-{{$loop->index + 1}}" class="fileBtn form-control form-file" onClick="$('#image-file-{{$loop->index + 1}}').click();">ファイルを変更</div> -->
    <input id="image-file-{{$loop->index + 1}}" type="file" class="file custom-file-input file-{{$loop->index + 1}}" name="image_{{$loop->index + 1}}" placeholder="サムネイル" style="display: none;">
</div>
@endforeach
@else
<div class="fileGroup-1">
    <div id="upArea-1">
        <img src="{{asset('/storage/cook_image/'.$image->image)}}" alt="thumbnail" class="upImg img-raised">
    </div>
    <div id="file-btn-1" class="fileBtn form-control form-file" onClick="$('#image-file-1').click();">ファイルを選択</div>
    <input id="image-file-1" type="file" class="file custom-file-input file-1" name="image_1" placeholder="サムネイル" style="display: none;">
</div>
@endif