class Node:
    def __init__(self, data):
        self.data = data
        self.left = None
        self.right = None


class BST:
    def __init__(self):
        self.root = None

    def insert(self, data):
        self.root = self._insert(self.root, data)

    def _insert(self, node, data):
        if node is None:
            return Node(data)
        if data < node.data:
            node.left = self._insert(node.left, data)
        elif data > node.data:
            node.right = self._insert(node.right, data)
        return node

    def search(self, data):
        node = self.root
        while node:
            if data == node.data:
                return True
            node = node.left if data < node.data else node.right
        return False

    def find_min(self):
        node = self.root
        while node and node.left:
            node = node.left
        return node.data if node else None

    def find_max(self):
        node = self.root
        while node and node.right:
            node = node.right
        return node.data if node else None

    def delete(self, data):
        self.root = self._delete(self.root, data)

    def _delete(self, node, data):
        if node is None:
            return None
        if data < node.data:
            node.left = self._delete(node.left, data)
        elif data > node.data:
            node.right = self._delete(node.right, data)
        else:
            if node.left is None:
                return node.right
            if node.right is None:
                return node.left
            successor = node.right
            while successor.left:
                successor = successor.left
            node.data = successor.data
            node.right = self._delete(node.right, successor.data)
        return node

    def inorder(self, node="start"):
        if node == "start":
            node = self.root
        if node is None:
            return []
        return self.inorder(node.left) + [node.data] + self.inorder(node.right)

    def preorder(self, node="start"):
        if node == "start":
            node = self.root
        if node is None:
            return []
        return [node.data] + self.preorder(node.left) + self.preorder(node.right)

    def postorder(self, node="start"):
        if node == "start":
            node = self.root
        if node is None:
            return []
        return self.postorder(node.left) + self.postorder(node.right) + [node.data]

    def level_order(self):
        hasil, antrian = [], ([self.root] if self.root else [])
        while antrian:
            node = antrian.pop(0)
            hasil.append(node.data)
            if node.left:
                antrian.append(node.left)
            if node.right:
                antrian.append(node.right)
        return hasil

    def height(self, node="start"):
        if node == "start":
            node = self.root
        if node is None:
            return -1
        return 1 + max(self.height(node.left), self.height(node.right))

    def tampilkan(self):
        if self.root:
            print(self.root.data)
            self._cetak(self.root, "")

    def _cetak(self, node, prefix):
        anak = [n for n in (node.left, node.right) if n]
        for i, n in enumerate(anak):
            terakhir = i == len(anak) - 1
            print(prefix + ("└── " if terakhir else "├── ") + str(n.data))
            self._cetak(n, prefix + ("    " if terakhir else "│   "))


if __name__ == "__main__":
    tree = BST()
    for angka in [50, 30, 70, 20, 40, 60, 80, 35, 45]:
        tree.insert(angka)

    tree.tampilkan()
    print("Inorder    :", tree.inorder())
    print("Preorder   :", tree.preorder())
    print("Postorder  :", tree.postorder())
    print("Level order:", tree.level_order())
    print("Cari 40    :", tree.search(40))
    print("Cari 99    :", tree.search(99))
    print("Min / Max  :", tree.find_min(), "/", tree.find_max())
    print("Tinggi     :", tree.height())

    tree.delete(30)
    tree.tampilkan()
    print("Inorder    :", tree.inorder())