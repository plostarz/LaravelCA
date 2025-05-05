<div class="mb-4">
    <label>Name</label>
    <input name="name" value="{{ old('name') }}" class="w-full border p-2">
  </div>
  <div class="mb-4">
    <label>Base</label>
    <input name="base" value="{{ old('base') }}" class="w-full border p-2">
  </div>
  <div class="mb-4">
    <label>Principal</label>
    <input name="principal" value="{{ old('principal') }}" class="w-full border p-2">
  </div>
  <div class="mb-4">
    <label>Founded Year</label>
    <input type="number" name="founded_year" value="{{ old('founded_year') }}" class="w-full border p-2">
  </div>
  <div class="mb-4">
    <label>Logo/Image</label>
    <input type="file" name="image" accept="image/*" class="w-full border p-2">
  </div>**
  ```blade
  <div class="mb-4">
    <label>Name</label>
    <input name="name" value="{{ old('name') }}" class="w-full border p-2">
  </div>
  <div class="mb-4">
    <label>Nationality</label>
    <input name="nationality" value="{{ old('nationality') }}" class="w-full border p-2">
  </div>
  <div class="mb-4">
    <label>Team</label>
    <select name="team_id" class="w-full border p-2">
      <option value="">-- None --</option>
      @foreach($teams as $id=>$name)
        <option value="{{ $id }}" {{ old('team_id')==$id?'selected':'' }}>{{ $name }}</option>
      @endforeach
    </select>
  </div>
  <div class="mb-4">
    <label>Date of Birth</label>
    <input type="date" name="date_of_birth" value="{{ old('date_of_birth') }}" class="w-full border p-2">
  </div>
  <div class="mb-4">
    <label>Photo</label>
    <input type="file" name="image" accept="image/*" class="w-full border p-2">
  </div>