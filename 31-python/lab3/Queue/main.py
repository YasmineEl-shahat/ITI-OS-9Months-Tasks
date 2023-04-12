from queue import Queue, EnhancedQueue

# q = Queue()
# q.insert(1)
# q.insert(2)
# q.insert(3)
#
# print(q.pop())  # Output: 1
# print(q.pop())  # Output: 2
# print(q.pop())  # Output: 3
# print(q.is_empty())  # Output: True

# queue1 = EnhancedQueue("queue1", 3)
# queue1.insert(1)
# queue1.insert(2)
# queue1.insert(3)
# queue1.insert(4)  # this will raise a QueueOutOfRangeException
# queue1.pop()      # returns 1
# queue1.pop()      # returns 2
# queue1.pop()      # returns 3
# queue1.pop()      # this will print a warning message and return None

# queue1 = EnhancedQueue("queue1", 3)
# queue1.insert(1)
# queue1.insert(2)
# queue1.insert(3)
#
# queue1 = EnhancedQueue("queue2", 4)
# queue1.insert(5)
# queue1.insert(2)
# queue1.insert(3)
# queue1.insert(1)
#
# EnhancedQueue.save("queues.json");

# EnhancedQueue.load("queues.json")
# queue2 = EnhancedQueue.get_queue("queue2")
# print(queue2.pop())
# print(queue2.pop())