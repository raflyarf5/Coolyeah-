class Node:
    """Kelas untuk merepresentasikan simpul (node) individual dalam BST."""
    def __init__(self, key):
        self.key = key
        self.left = None   # Pointer ke anak kiri
        self.right = None  # Pointer ke anak kanan


class BinarySearchTree:
    """Kelas utama pengelola operasi Binary Search Tree (BST)."""
    def __init__(self):
        self.root = None

    # ==========================================
    # 1. OPERASI PENYISIPAN (INSERTION)
    # ==========================================
    def insert(self, key):
        """Metode publik untuk memasukkan nilai baru ke dalam BST."""
        self.root = self._insert_recursive(self.root, key)

    def _insert_recursive(self, current_node, key):
        """Fungsi rekursif pembantu untuk menemukan posisi kosong dan memasukkan node."""
        # Jika menemukan posisi kosong (None), buat node baru
        if current_node is None:
            return Node(key)

        # Aturan BST: Nilai lebih kecil ke sub-pohon kiri, lebih besar ke sub-pohon kanan
        if key < current_node.key:
            current_node.left = self._insert_recursive(current_node.left, key)
        elif key > current_node.key:
            current_node.right = self._insert_recursive(current_node.right, key)

        return current_node

    # ==========================================
    # 2. OPERASI PENCARIAN (SEARCHING)
    # ==========================================
    def search(self, key):
        """Metode publik untuk mencari kunci/nilai dalam BST."""
        return self._search_recursive(self.root, key)

    def _search_recursive(self, current_node, key):
        """Fungsi rekursif pembantu untuk melakukan pencarian kunci."""
        # Kondisi dasar: Node tidak ditemukan (None) atau Kunci berhasil ditemukan
        if current_node is None or current_node.key == key:
            return current_node

        # Jika nilai yang dicari lebih kecil dari node saat ini, cari ke sub-pohon kiri
        if key < current_node.key:
            return self._search_recursive(current_node.left, key)
        # Jika nilai yang dicari lebih besar, cari ke sub-pohon kanan
        return self._search_recursive(current_node.right, key)

    # ==========================================
    # 3. OPERASI PENGHAPUSAN (DELETION)
    # ==========================================
    def min_value_node(self, node):
        """Menemukan simpul dengan nilai terkecil (In-order Successor) pada sub-pohon."""
        current = node
        while current.left is not None:
            current = current.left
        return current

    def delete(self, key):
        """Metode publik untuk menghapus nilai dari BST."""
        self.root = self._delete_recursive(self.root, key)

    def _delete_recursive(self, current_node, key):
        """Fungsi rekursif pembantu untuk mengolah penghapusan node."""
        if current_node is None:
            return current_node

        # Navigasi mencari node yang ingin dihapus
        if key < current_node.key:
            current_node.left = self._delete_recursive(current_node.left, key)
        elif key > current_node.key:
            current_node.right = self._delete_recursive(current_node.right, key)
        else:
            # NODE DITEMUKAN! Memproses 3 kasus penghapusan:

            # Kasus 1 & 2: Node hanya memiliki 1 anak atau tidak punya anak (leaf node)
            if current_node.left is None:
                temp = current_node.right
                current_node = None
                return temp
            elif current_node.right is None:
                temp = current_node.left
                current_node = None
                return temp

            # Kasus 3: Node memiliki 2 anak
            # Cari inorder successor (nilai terkecil di sub-pohon kanan)
            temp = self.min_value_node(current_node.right)
            # Ganti nilai node saat ini dengan nilai successor
            current_node.key = temp.key
            # Hapus node successor tersebut dari sub-pohon kanan
            current_node.right = self._delete_recursive(current_node.right, temp.key)

        return current_node

    # ==========================================
    # 4. METODE PENELUSURAN (TRAVERSAL)
    # ==========================================
    def inorder_traversal(self):
        """In-order (Left -> Root -> Right): Menghasilkan urutan data terurut naik."""
        result = []
        self._inorder(self.root, result)
        return result

    def _inorder(self, node, result):
        if node:
            self._inorder(node.left, result)
            result.append(node.key)
            self._inorder(node.right, result)

    def preorder_traversal(self):
        """Pre-order (Root -> Left -> Right): Digunakan untuk serialisasi/duplikasi pohon."""
        result = []
        self._preorder(self.root, result)
        return result

    def _preorder(self, node, result):
        if node:
            result.append(node.key)
            self._preorder(node.left, result)
            self._preorder(node.right, result)

    def postorder_traversal(self):
        """Post-order (Left -> Right -> Root): Digunakan untuk penghapusan pohon/evaluasi."""
        result = []
        self._postorder(self.root, result)
        return result

    def _postorder(self, node, result):
        if node:
            self._postorder(node.left, result)
            self._postorder(node.right, result)
            result.append(node.key)


# ==========================================
# CONTOH PENGGUNAAN (DRIVER CODE)
# ==========================================
if __name__ == "__main__":
    bst = BinarySearchTree()
    
    # 1. Memasukkan elemen ke dalam pohon
    elements = [1-7]
    for el in elements:
        bst.insert(el)

    print("--- PENELUSURAN (TRAVERSAL) ---")
    print("In-Order Traversal  (Terurut):", bst.inorder_traversal())
    print("Pre-Order Traversal          :", bst.preorder_traversal())
    print("Post-Order Traversal         :", bst.postorder_traversal())

    print("\n--- PENCARIAN (SEARCH) ---")
    search_key = 40
    result_node = bst.search(search_key)
    if result_node:
        print(f"Kunci {search_key} DITEMUKAN di dalam pohon.")
    else:
        print(f"Kunci {search_key} TIDAK DITEMUKAN di dalam pohon.")

    print("\n--- PENGHAPUSAN (DELETION) ---")
    print("Hapus node 20 (Kasus 0 anak - Leaf node)...")
    bst.delete(20)
    print("In-Order setelah hapus 20:", bst.inorder_traversal())

    print("\nHapus node 30 (Kasus 2 anak)...")
    bst.delete(30)
    print("In-Order setelah hapus 30:", bst.inorder_traversal())