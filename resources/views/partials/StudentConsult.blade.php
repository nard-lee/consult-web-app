<div class="consult p-5">
    <h3>Consultation Appointment</h3>
    <div class="consult-time">
        <div class="flex items-center gap-2">
            <input type="checkbox" class="form-checkbox" name="constime" value=""/>
            <p>Schedules: Monday 06:00 PM - 11:00 PM ( Jane Andrew )</p>
        </div>
        <div class="flex items-center gap-2">
            <input type="checkbox" class="form-checkbox" name="constime" value=""/>
            <p>Schedules: Monday 06:00 AM - 08:00 AM ( Sunny Brook )</p>
        </div>
    </div>
    <form action="" class="flex flex-col gap-5">
        <div class="form-group flex flex-col gap-2">
            <label for=""><i class="fas fa-at"></i> Email</label>
            <input type="text" value="{{ $user['email'] }}">
        </div>
        <div class="form-group flex flex-col gap-2">
            <label for=""><i class="fas fa-id-card"></i> ID number</label>
            <input type="text" value="{{ $user['user_id'] }}">
        </div>
        <div class="form-group flex flex-col gap-2">
            <label for=""><i class="fas fa-book-open"></i> Subject Code</label>
            <input type="text" placeholder="Subject Code">
        </div>
        <div class="form-group flex flex-col gap-2">
            <label for=""><i class="fas fa-pen"></i> Concern / Topics</label>
            <input type="text" placeholder="Concern/Topic">
        </div>
        <button>Submit</button>
    </form>
</div>
