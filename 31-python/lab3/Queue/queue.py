
import json

class Queue:
    def __init__(self):
        self.items = []

    def insert(self, value):
        """Insert a new value at the rear of the queue"""
        self.items.append(value)

    def pop(self):
        """Return and remove a value from the front of the queue"""
        if self.is_empty():
            print("Warning: Cannot pop value from an empty queue")
            return None
        else:
            return self.items.pop(0)

    def is_empty(self):
        """Return True if the queue is empty, False otherwise"""
        return len(self.items) == 0




class EnhancedQueue(Queue):
    all_queues = {}

    def __init__(self, name, size):
        super().__init__()
        self.name = name
        self.size = size
        # This allows us to keep track of all instances of the class that have been created so far,
        self.__class__.all_queues[name] = self


    def insert(self, value):
        """Insert a new value at the rear of the queue"""
        if len(self.items) < self.size:
            super().insert(value)
        else:
            raise QueueOutOfRangeException(f"Queue {self.name} is full")

    @classmethod
    def get_queue(cls, name):
        return cls.all_queues.get(name, None)


    @classmethod
    def save(cls, filename):
        with open(filename, "w") as f:
            queues_dict = {queue_name: queue.items for queue_name, queue in cls.all_queues.items()}
            json.dump(queues_dict, f)

    @classmethod
    def load(cls, filename):
        with open(filename, "r") as f:
            queues_dict = json.load(f)
            for queue_name, queue_items in queues_dict.items():
                queue = cls(queue_name, len(queue_items))
                queue.items = queue_items
                cls.all_queues[queue_name] = queue


class QueueOutOfRangeException(Exception):
    pass



