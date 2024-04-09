<div>
    <h1>{{$count}}</h1>
    <h1>{{$author}}</h1>
    <button wire:click="increment">+</button>
    <button wire:click="decrement">-</button>
    @if(!empty($success))
        <div class="alert alert-success">
        {{ $success }}
        </div>
    @endif
    <div class="container-fluid">
        <div class="col-md-4">
            <form wire:submit.prevent="create">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter name" wire:model="name">
                    @error('name') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" placeholder="Enter email" wire:model="email">
                    @error('email') <span class="error">{{ $message }}</span> @enderror

                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="text" class="form-control" id="password" placeholder="Enter password" wire:model="password">
                    @error('password') <span class="error">{{ $message }}</span> @enderror
                </div><br>
                <button type="submit" class="btn btn-primary" wire:click="create">Create</button>
            </form>
        </div>
    </div>
</div>
