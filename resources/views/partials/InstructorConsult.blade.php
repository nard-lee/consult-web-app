<div class="m-panel flex flex-col gap-7">
    <div class="cs-panel consults flex flex-col gap-7">
        <h2>Consultations</h2>
        <div class="consult-list">

            <table>
                <tr>
                    <th>Student</th>
                    <th>Instructor</th>
                    <th>Concern</th>
                </tr>
                @foreach ($apts as $apt)
                    <tr>
                        <td>{{ $apt->sf_name }} {{ $apt->sl_name }}</td>
                        <td>{{ $apt->if_name }} {{ $apt->il_name }}</td>
                        <td>{{ $apt->concern }}</td>
                        <td>
                            <form class="del-apt" action="/delapt" method="POST">
                                @csrf
                                <input name="apt_id" type="text" value="{{ $apt->apt_id }}" style="display: none">
                                <button>delete <i class="fas fa-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>

        </div>
    </div>

</div>
