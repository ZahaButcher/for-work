using MySql.Data.MySqlClient;
using System;
using System.Collections.Generic;
using System.Data;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows;
using System.Windows.Controls;
using System.Windows.Data;
using System.Windows.Documents;
using System.Windows.Input;
using System.Windows.Media;
using System.Windows.Media.Imaging;
using System.Windows.Navigation;
using System.Windows.Shapes;

namespace RabotaBase
{
    /// <summary>
    /// Логика взаимодействия для MainWindow.xaml
    /// </summary>
    
    public partial class MainWindow : Window
    {
        
        
        public MainWindow()
        {
            InitializeComponent();
        }

        private void ButtonAdd_Click(object sender, RoutedEventArgs e)
        {
            MySqlConnection myConnection = new MySqlConnection("Data source=localhost; Initial Catalog=zakhar ;user=root;  ");
            
            MySqlCommand command = new MySqlCommand($"INSERT INTO product (Img, Name, Genre, Description, Price, Amount) VALUES ('{Name.Text}.jpg', '{Name.Text}', '{Genre.Text}', '{Descrition.Text}', {Convert.ToInt32(Price.Text)},{Convert.ToInt32(Amount.Text)})", myConnection);
           
            myConnection.Open(); //Устанавливаем соединение с базой данных
            
            if(command.ExecuteNonQuery() == 1) 
            {
                MessageBox.Show("Успешно добавлено!");
            }
            else
            {
                MessageBox.Show("Не добавлено");
            }

            myConnection.Close();
            Name.Text = "";
            Genre.Text = "";
            Descrition.Text = "";
            Price.Text = "";
            Amount.Text = "";
        }
    }
}
