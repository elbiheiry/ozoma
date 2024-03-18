@foreach ($templates as $template)
    <div class="col-lg-3 col-md-4 col-sm-6">
        <button class="design_item template" data-id="{{ $template->id }}">
            <img src="{{ get_image($template->image, 'templates') }}" />
            <h3>{{ $template->name }}</h3>
        </button>
    </div>
@endforeach
