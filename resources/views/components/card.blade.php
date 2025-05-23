{{-- 
French Learning Tracker Application
ICS4U
Laura, Joshua, Jasper
Blade component for displaying a styled card:
- Accepts an optional `highlight` prop to visually emphasize the card
History:
February 12: File creation
April 21: Added all specific adjustments
--}}

@props(['highlight' => false]) {{-- Defines component props --}}

<div @class(['highlight' =>$highlight, 'card'])>
    {{ $slot }} {{-- Renders the component's content --}}
</div>