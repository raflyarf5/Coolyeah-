from collections import deque

# Graf (adjacency list)
graph = {
    'A': ['B', 'C'],
    'B': ['D', 'E'],
    'C': ['F'],
    'D': [],
    'E': ['F'],
    'F': []
}


# ---------- BFS (menggunakan queue) ----------
def bfs(graph, start):
    visited = set([start])
    queue = deque([start])
    hasil = []

    while queue:
        node = queue.popleft()      # ambil dari depan antrian
        hasil.append(node)

        for tetangga in graph[node]:
            if tetangga not in visited:
                visited.add(tetangga)
                queue.append(tetangga)

    return hasil


# ---------- DFS rekursif ----------
def dfs_rekursif(graph, node, visited=None, hasil=None):
    if visited is None:
        visited = set()
    if hasil is None:
        hasil = []

    visited.add(node)
    hasil.append(node)

    for tetangga in graph[node]:
        if tetangga not in visited:
            dfs_rekursif(graph, tetangga, visited, hasil)

    return hasil


# ---------- DFS iteratif (menggunakan stack) ----------
def dfs_iteratif(graph, start):
    visited = set()
    stack = [start]
    hasil = []

    while stack:
        node = stack.pop()          # ambil dari atas stack
        if node not in visited:
            visited.add(node)
            hasil.append(node)
            # dibalik agar urutan kunjungan sama dengan versi rekursif
            for tetangga in reversed(graph[node]):
                if tetangga not in visited:
                    stack.append(tetangga)

    return hasil


# ---------- Pencarian jalur terpendek dengan BFS ----------
def bfs_jalur_terpendek(graph, start, tujuan):
    visited = {start}
    queue = deque([[start]])

    while queue:
        jalur = queue.popleft()
        node = jalur[-1]

        if node == tujuan:
            return jalur

        for tetangga in graph[node]:
            if tetangga not in visited:
                visited.add(tetangga)
                queue.append(jalur + [tetangga])

    return None  # tidak ada jalur


# ---------- Uji coba ----------
if __name__ == "__main__":
    print("BFS            :", bfs(graph, 'A'))
    print("DFS rekursif   :", dfs_rekursif(graph, 'A'))
    print("DFS iteratif   :", dfs_iteratif(graph, 'A'))
    print("Jalur A -> F   :", bfs_jalur_terpendek(graph, 'A', 'F'))