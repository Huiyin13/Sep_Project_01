@extends('layouts.staffapp')
@section('content')
<!DOCTYPE html>
<x-app-layout>
    <x-slot name="header">
        <h2>Status chart dashboard</h2>
    <x-slot>

    <div>
        <h2>Status chart dashboard</h2>
        <div id="status-chart-container" style="height:300px;"></div>
    </div>

    @push('js')

    <!-- Application script -->
    <!--     <script>
        const statuschart = new Chartisan({
            el: '#status-chart-container',
            url: "@chart('status_chart)",
        })
        
    </script>
        -->
    <script>
        const statuschart = new Chartisan({
            el: '#sales-chart-container',
            url: "@chart('status_chart)",
            hooks: new ChartisanHooks()
            .colors()
            .datasets([{type:'line',borderColor:'green'},'bar'])
        })
    </script>


    @endpush
<x-app-layout>
</html>
@endsection