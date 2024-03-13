<div class="flex flex-col gap-7">
    <div class="dashboard flex flex-col gap-9">
        <h3>Dashboard</h3>
        <form action="" class="user-update flex gap-5">
            <input type="text" value="{{ $user['f_name'] }}">
            <input type="text" value="{{ $user['l_name'] }}">
        </form>
    </div>
    <div class="cs-panel lex flex-col gap-7">
        <h2>Subjects</h2>
        <table>
            <tr>
                <th>Subject</th>
                <th>Instructor</th>
                <th>Schedule</th>
            </tr>
            @foreach ($subjects as $subject)
                @php
                    $sched = json_decode($subject->sched_time);
                @endphp

                <form>
                    <tr>
                        <td>{{ $subject->sub_code }}</td>
                        <td>{{ $subject->f_name }} {{ $subject->l_name }}</td>
                        <td>{{ $sched->day }} {{ $sched->start }} - {{ $sched->end }}</td>
                        <td>
                            <button>update <i class="fas fa-pencil-alt"></i></button>
                        </td>
                    </tr>
                </form>
            @endforeach
        </table>

    </div>

</div>
