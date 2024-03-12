<div class="consult p-5">
    <h3>Consultation Appointment</h3>
    <form class="apt-form flex flex-col gap-5" action="/appoint" method="POST">
        @csrf
        <div>
            @foreach ($apt_sched as $schedule)
                @php
                    $date_time = json_decode($schedule->date_time, true);
                @endphp
                <div class="consult-time">
                    <div class="flex items-center gap-2">
                        <input type="radio" class="form-checkbox" name="instructor_id"
                            value="{{ $schedule->user_id }}" />
                        <p>Schedules:
                            {{ $date_time['day'] }}
                            {{ $date_time['start'] }} -
                            {{ $date_time['end'] }}
                            ({{ $schedule->f_name }}
                            {{ $schedule->l_name }})
                        </p>
                    </div>
                </div>
            @endforeach

        </div>
        <div class="form-group flex flex-col gap-2">
            <label for=""><i class="fas fa-at"></i> Email</label>
            <input name="email" type="text" value="{{ $user['email'] }}">
        </div>
        <div class="form-group flex flex-col gap-2">
            <label for=""><i class="fas fa-id-card"></i> ID number</label>
            <input name="student_id" type="text" value="{{ $user['user_id'] }}">
        </div>
        {{-- <div class="form-group flex flex-col gap-2">
            <label for=""><i class="fas fa-book-open"></i> Subject Code</label>
            <input type="text" placeholder="Subject Code">
        </div> --}}
        <div class="form-group flex flex-col gap-2">
            <label for=""><i class="fas fa-pen"></i> Concern / Topics</label>
            <textarea name="concern" name="" id="" cols="30" rows="10" placeholder="Concerns/Topic"></textarea>
        </div>
        <button>Submit</button>
    </form>
</div>

{{-- <script>
    document.querySelector('.apt-form').addEventListener('submit', (event) => {
        event.preventDefault();

        let input = event.target;



        fetch('/appointment', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                        'content'),
                },
                body: JSON.stringify({
                    instructor_id: input.instructor_id.value,
                    student_id: input.student_id.value,
                    concern: input.concern.value
                }),
            })
            .then(response => response.text())
            .then(data => {
                console.log(data)
                // if (data.errors) {
                //     let err = data.errors;
                //     if (err.email) document.querySelector('.eMerr').innerHTML = err.email;
                //     if (err.password) document.querySelector('.pWerr').innerHTML = err.password;
                // }

                // if (data.success) {
                //     console.log(data);
                //     window.location.href = "/dashboard";
                // }
            })
    });
</script> --}}
