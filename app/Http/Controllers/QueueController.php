<?php

namespace App\Http\Controllers;

use App\Models\ServingQueue;
use Illuminate\Http\Request;
use App\Models\Queue;

class QueueController extends Controller
{

    public function show($id)
    {
        // Retrieve the queue by ID
        $queue = Queue::findOrFail($id);

        // Pass the queue to the view
        return view('queues.show', ['queue' => $queue]);
    }
    public function create()
    {
        return view('queues.create');
    }

    public function store(Request $request)
    {
        // Validate the request...

        // Create a new queue instance and save it
        $queue = new Queue();
        $queue->name = $request->input('name');
        $queue->type_of_transaction = $request->input('type_of_transaction');
        $queue->save();

        // Redirect to a route that displays the queue ID
        return redirect()->route('queue.show', ['id' => $queue->id]);
    }

    public function deleteAll()
    {
        Queue::truncate();
        return redirect()->route('dashboard')->with('success', 'All queues deleted successfully!');
    }


    public function generateQueue()
    {
        $queueNumber = rand(100, 999); // Generate a random queue number
        ServingQueue::create(['queue_number' => $queueNumber]);

        return redirect()->route('dashboard'); // Redirect back to the dashboard
    }

    public function deleteAllServingQueues()
    {
        ServingQueue::truncate();
        return redirect()->route('dashboard')->with('success', 'All serving queues deleted successfully!');
    }

}
