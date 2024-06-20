#include <iostream>
#include <vector>
#include <algorithm>
#include <fstream>
#include <string>
using namespace std;

#define edge pair<int,int>

class Graph {
private:
    vector<pair<int, edge>> G; // graph
    vector<pair<int, edge>> T; // mst
    int* parent;
    int V; // number of vertices/nodes in graph
public:
    Graph(int V);
    void AddWeightedEdge(int u, int v, int w);
    int find_set(int i);
    void union_set(int u, int v);
    void kruskal();
    void print();
};
Graph::Graph(int V) {
    parent = new int[V];

    //i 0 1 2 3 4 5
    //parent[i] 0 1 2 3 4 5
    for (int i = 0; i < V; i++)
        parent[i] = i;

    G.clear();
    T.clear();
}
void Graph::AddWeightedEdge(int u, int v, int w) {
    G.push_back(make_pair(w, edge(u, v)));
}
int Graph::find_set(int i) {
    // If i is the parent of itself
    if (i == parent[i])
        return i;
    else
        // Else if i is not the parent of itself
        // Then i is not the representative of his set,
        // so we recursively call Find on its parent
        return find_set(parent[i]);
}

void Graph::union_set(int u, int v) {
    parent[u] = parent[v];
}
void Graph::kruskal() {
    int i, uRep, vRep;
    sort(G.begin(), G.end()); // increasing weight
    for (i = 0; i < G.size(); i++) {
        uRep = find_set(G[i].second.first);
        vRep = find_set(G[i].second.second);
        if (uRep != vRep) {
            T.push_back(G[i]); // add to tree
            union_set(uRep, vRep);
        }
    }
}
void Graph::print() {
    ofstream out;
    out.open("input_12.out");
    int s = 0;
    int matrix[57][57];
    memset(matrix, 0, sizeof(matrix));
    for (int i = 0; i < T.size(); i++) {
        matrix[T[i].second.first - 1][T[i].second.second - 1] = T[i].first;
        matrix[T[i].second.second - 1][T[i].second.first - 1] = T[i].first;
        s += T[i].first;
    }
    cout << s << endl;
    out << s << endl;

    for (int i = 0; i < 57; i++) {
        for (int j = 0; j < 57; j++) {
            printf("%d ", matrix[i][j]);
            out << matrix[i][j] << ", ";
        }
        out << endl;
        printf("\n");
    }

    for (int i = 0; i < T.size(); i++) {

        if (T[i].second.first > T[i].second.second) {
            cout << "(" << T[i].second.second << ", " << T[i].second.first << ")";//" : " << T[i].first;
            out << "(" << T[i].second.second << ", " << T[i].second.first << ")";
        }
        else {
            cout << "(" << T[i].second.first << ", " << T[i].second.second << ")";//" : " << T[i].first;
            out << "(" << T[i].second.first << ", " << T[i].second.second << ")";
        }
        cout << " ";
        out << " ";
        s += T[i].first;
    }
    cout << endl;
}
int main() {
    Graph g(58);
    ifstream f;
    
    f.open("input_12.in");
    string s;
    string s2;
    int i = 0;
    
    int flag = 0;
    string delimiter = " ";
     while (getline(f, s, '\n')) {
         int pos = 0;
         string token;
         if (flag == 0) {

             flag = 1;
             continue;
         }
         int j = 0;
            while ((pos = s.find(" ")) != string::npos) {
                token = s.substr(0, pos);
                std::cout << token << " ";
                if (token != "0") {
                    g.AddWeightedEdge(i + 1, j + 1, stoi(token));
                }
                j++;
                s.erase(0, pos + delimiter.length());
            }
            token = s.substr(0, pos);
            std::cout << token << " ";
            cout << endl;
        i++;
    }


    g.kruskal();
    g.print();
    return 0;
}