<?php
        Meta::addCss('admin-fix', '/packages/sleepingowl/default/css/admin-fix.css');
?>
@foreach ($children as $entry)
    <li class="dd-item dd3-item {{ $reorderable ? '' : 'dd3-not-reorderable' }}" data-id="{{ $entry->id }}">
        @if ($reorderable)
            <div class="dd-handle dd3-handle"></div>
        @endif
        <div class="dd3-content">
    	    <span class="dd3-fix">
	    <a href="/admin/products?category_id={{$entry->id}}">
            @if (is_callable($value))
                {!! $value($entry) !!}
            @else
                {{ $entry->{$value} }}
            @endif
	    </a>
	    </span>
        </div>
        @if ($entry->children && $entry->children->count() > 0)
            <ol class="dd-list">
                @include(AdminTemplate::getViewPath('display.tree_children'), ['children' => $entry->children])
            </ol>
        @endif
    </li>
@endforeach
