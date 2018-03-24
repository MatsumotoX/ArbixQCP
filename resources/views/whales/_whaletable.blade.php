<div class = "row">
        <br>
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <th>#</th>
                    <th>Base Rate</th>
                    <th>%</th>
                    <th>Bids</th>
                    <th>Asks</th>
                    <th>Volume (ETH)</th>
                    <th>Fill %</th>
                    <th>Profit</th>
                    <th>Status</th>
                    <th>Create At</th>

                    <th><a class="btn btn-success btn-sm">Replace All</a> <a class="btn btn-danger btn-sm">Cancel All</a></th>
                </thead>

                <tbody>
                    
                    @foreach ($whales as $key=>$whale)

                        <tr>
                            <td>{{ $key }}</td>
                            <td>{{ $whale->base_rate }}</td>
                            <td>{{ $whale->percentage }}</td>
                            <td>{{ $whale->bid }}</td>
                            <td>{{ $whale->ask }}</td>
                            <td>{{ $whale->volume }}</td>
                            <td>{{ $whale->fill }}</td>
                            <td>{{ $whale->profit }}</td>
                            <td>{{ $whale->status }}</td>
                            <td>{{ date( 'M j, Y h:ia', strtotime($whale->created_at)) }}</td>
                            <td><a href="{{ route('whalekrakens.show', $whale->id) }}" class="btn btn-default btn-sm">View</a> <a href="{{ route('whalekrakens.replace', $whale->id) }}" class="btn btn-default btn-sm">Replace</a> <a href="{{ route('whalekrakens.cancel', $whale->id) }}" class="btn btn-default btn-sm">Cancel</a></td>
                        </tr>

                    @endforeach

                </tbody>

            </table>
        </div>
    </div>
    </div>