<div id="fields">
    <div class="form-group row">
        <div class="col-6">
            <label for="field">Field</label>
            <input type="text" class="form-control" name="field_1" placeholder=""
                   value="{{$update ? $update->field : ''}}" >

        </div>
        <div class="col-6">
            <label for="meaning">Meaning</label>
            <input type="text" class="form-control" name="meaning_1" value="{{$update ? $update->meaning : ''}}"
                   >
        </div>
        <div class="col-12">
            <label for="example">Example</label>
            <textarea type="text" class="form-control" name="example_1"
                      value="{{$update ? $update->example : ''}}"></textarea>
        </div>
        <div class="col-12">
            <label for="example_meaning">Example Meaning</label>
            <textarea type="text" class="form-control" name="example_meaning_1"
                      value="{{$update ? $update->example_meaning : ''}}"></textarea>
        </div>
        <div class="col-12">
            <label for="note">Note</label>
            <input type="text" class="form-control" name="note_1" placeholder=""
                   value="{{$update ? $update->note : ''}}">
        </div>
    </div>
</div>

<input type="text" class="d-none" id="fields_total" name="fields_total" value="1">

{{--<button class="btn btn-primary ml-auto" type="button" id="add_field">Add field - meaning</button>--}}

@push('custom-scripts')
    <script>
        console.log("update_edit scripts");
    </script>
    <script>
        var i = 1;
        $('#add_field').on("click", function () {
            i++;
            $('<br>').appendTo('#fields');

            var div1 = $('<div></div>').attr({
                class: 'form-group row',
            }).appendTo($('#fields'));

            var div1_1 = $('<div></div>').attr({
                class: 'col-6',
            }).appendTo($(div1));

            var div1_2 = $('<div></div>').attr({
                class: 'col-6',
            }).appendTo($(div1));

            var div1_3 = $('<div></div>').attr({
                class: 'col-12',
            }).appendTo($(div1));


            $('<label>Field<label/>').attr({
                for: 'field',
            }).appendTo(div1_1);

            $('<input/>').attr({
                type: 'text',
                class: 'form-control',
                name: 'field_' + i,
                placeholder: ''
            }).appendTo(div1_1);


            $('<label>Meaning</label>').attr({
                for: 'meaning',
            }).appendTo(div1_2);

            $('<input/>').attr({
                type: 'text',
                class: 'form-control',
                name: 'meaning_' + i,
                placeholder: ''
            }).appendTo(div1_2);


            $('<label>Example</label>').attr({
                for: 'example',
            }).appendTo(div1_3);

            $('<textarea></textarea>').attr({
                type: 'text',
                class: 'form-control',
                name: 'example_' + i,
                placeholder: ''
            }).appendTo(div1_3);

            $('<label>Example meaning</label>').attr({
                for: 'example_meaning',
            }).appendTo(div1_3);

            $('<textarea></textarea>').attr({
                type: 'text',
                class: 'form-control',
                name: 'example_meaning_' + i,
                placeholder: ''
            }).appendTo(div1_3);

            $('<label>Note</label>').attr({
                for: 'note',
            }).appendTo(div1_3);

            $('<input/>').attr({
                type: 'text',
                class: 'form-control',
                name: 'note_' + i,
                placeholder: ''
            }).appendTo(div1_3);

            $('#fields_total').attr({
                value: i
            })
        });


    </script>
@endpush