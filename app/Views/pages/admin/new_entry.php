<?php if (isset($validation) && $validation->getErrors()): ?>
  <div class="font-regular fixed block w-full bg-red-900 p-4 text-base leading-5 text-white opacity-100">
      <?php foreach ($validation->getErrors() as $error): ?>
        <?= $error ?> 
        <?php endforeach; ?>
    </div>
<?php endif; ?>
<?php if (isset($assignment_id)): ?>
  <div class="font-regular fixed block w-full bg-red-900 p-4 text-base leading-5 text-white opacity-100">
        <?= $assignment_id ?> 
    </div>
<?php endif; ?>


<form method="post" action="<?= base_url() ?>/admin/timesheet/new_entry"
  class="bg-white w-2/3 mx-auto mt-32 text-gray-900 shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2">
  <div class="-mx-3 md:flex mb-6">
    <div class="md:w-1/2 px-3 mb-6 md:mb-0">
      <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="client">
        Clients
      </label>
      <select id="client_id" name="client_id"
        class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3">
        <option value="">Select a client</option>
        <?php foreach ($clients as $client) { ?>
          <option value="<?= $client->id ?>"><?= $client->name ?></option>
        <?php } ?>
      </select>

    </div>
    <div class="md:w-1/2 px-3">
      <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="project">
        Projects
      </label>
      <select id="project_id" name="project_id" disabled
        class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4">
      </select>
    </div>
  </div>
  <div class="-mx-3 md:flex mb-6">
    <div class="md:w-full px-3">
      <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="activity">
        Activity
      </label>
      <select id="activity_id" name="activity_id" disabled
        class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3">
      </select>
    </div>

  </div>

  <div class="-mx-3 md:flex mb-6">
    <div class="md:w-1/2 px-3 mb-6 md:mb-0">
      <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="date">
        Date
      </label>
      <input type="date" name="date" id="date"
        class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3">
    </div>
    <div class="md:w-1/2 px-3">
      <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="hours">
        Hours
      </label>
      <select name="hours" id="hours" disabled
        class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4">
        <option value=""></option>
        <option value="0.25">00:15</option>
        <option value="0.5">00:30</option>
        <option value="0.75">00:45</option>
        <option value="1">01:00</option>
        <option value="1.25">01:15</option>
        <option value="1.5">01:30</option>
        <option value="1.75">01:45</option>
        <option value="2">02:00</option>
        <option value="2.25">02:15</option>
        <option value="2.5">02:30</option>
        <option value="2.75">02:45</option>
        <option value="3">03:00</option>
        <option value="3.25">03:15</option>
        <option value="3.5">03:30</option>
        <option value="3.75">03:45</option>
        <option value="4">04:00</option>
        <option value="4.25">04:15</option>
        <option value="4.5">04:30</option>
        <option value="4.75">04:45</option>
        <option value="5">05:00</option>
        <option value="5.25">05:15</option>
        <option value="5.5">05:30</option>
        <option value="5.75">05:45</option>
        <option value="6">06:00</option>
        <option value="6.25">06:15</option>
        <option value="6.5">06:30</option>
        <option value="6.75">06:45</option>
        <option value="7">07:00</option>
        <option value="7.25">07:15</option>
        <option value="7.5">07:30</option>
        <option value="7.75">07:45</option>
        <option value="8">08:00</option>
        <option value="8.25">08:15</option>
        <option value="8.5">08:30</option>
        <option value="8.75">08:45</option>
        <option value="9">09:00</option>
      </select>
    </div>
  </div>
  <div class="-mx-3 md:flex mb-6">
    <div class="md:w-full px-3">
      <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="notes">
        Comments
      </label>
      <input
        class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3"
        name="notes" id="notes" type="text">

    </div>

  </div>
  <div class="-mx-3 md:flex mb-6">
    <div class="md:w-full px-3">
      <input type="submit" value="Log Entry" name="submit"
        class="appearance-none bg-indigo-600 text-white block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-3">
    </div>

  </div>
</form>

<script>
  $(document).ready(function () {
    $('#client_id').change(function () {
      const client_id = $(this).val();
      if (client_id != '') {
        $('#project_id').prop('disabled', false);
        $.ajax({
          url: '<?= base_url() ?>/ajax/getProjects',
          type: 'POST',
          data: { client_id: client_id },
          dataType: 'json',
          success: function (data) {
            $('#project_id').find('option').remove();
            $('#project_id').append('<option value="">Select a project</option>');
            $.each(data, function (key, value) {
              $('#project_id').append('<option value="' + value.id + '">' + value.name + '</option>');
            });
          },
          error: function (xhr, status, error) {
            alert(xhr.responseText);
          }
        });
      }
    })

    $('#project_id').change(function () {
      const project_id = $(this).val();
      if (project_id != '') {
        $('#activity_id').prop('disabled', false);
        $('#hours').prop('disabled', false);
        $.ajax({
          url: '<?= base_url() ?>/ajax/getActivities',
          type: 'POST',
          data: { project_id: project_id },
          dataType: 'json',
          success: function (data) {
            $('#activity_id').find('option').remove();
            $('#activity_id').append('<option value="">Select an activity</option>');
            $.each(data, function (key, value) {
              $('#activity_id').append('<option value="' + value.id + '">' + value.name + '</option>');
            });
          },
          error: function (xhr, status, error) {
            alert(xhr.responseText);
          }
        });
      }
    })
    
  })
</script>
</body>

</html>