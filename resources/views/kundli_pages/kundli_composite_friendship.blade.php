
<div class="p-2 appform">
    <div class="innerforms">
    <div class="tableliner" style="width:100%;">
        <h5 class="birth" style="font-size: 17px;">Natural Friendship <hr class="kundlitag" style=" width: 115px;"> </h5>
        <h5></h5>
        <table>
            <thead>
                <tr>
                    <th style="color: #2c2c2c;">Planet Name</th>
                    @foreach (array_keys($data['natural_friendship']) as $planet)
                        <th style="color: #2c2c2c;">{{ $planet }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($data['natural_friendship'] as $planet => $relations)
                    <tr>
                        <td>{{ $planet ?? '' }}</td>
                        @foreach ($relations as $relation)
                            <td>{{ $relation ?? '' }}</td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>


        <h5 class="birth" style="font-size: 17px;">Temporary Friendship <hr class="kundlitag" style=" width: 115px;"> </h5>
        <table>
            <thead>
                <tr>
                    <th style="color: #2c2c2c;">Planet Name</th>
                    @foreach (array_keys($data['temporary_friendship']) as $planet)
                        <th style="color: #2c2c2c;">{{ $planet ?? '' }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($data['temporary_friendship'] as $planet => $relations)
                    <tr>
                        <td>{{ $planet }}</td>
                        @foreach ($relations as $relation)
                            <td>{{ $relation ?? '' }}</td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h5 class="birth" style="font-size: 17px;">Five Fold Friendship<hr class="kundlitag" style=" width: 115px;"> </h5>
        <table>
            <thead>
                <tr>
                    <th style="color: #2c2c2c;">Planet Name</th>
                    @foreach (array_keys($data['five_fold_friendship']) as $planet)
                        <th style="color: #2c2c2c;">{{ $planet ?? '' }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($data['five_fold_friendship'] as $planet => $relations)
                    <tr>
                        <td>{{ $planet }}</td>
                        @foreach ($relations as $relation)
                            <td>{{ $relation ?? '' }}</td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
  </div>
</div>


