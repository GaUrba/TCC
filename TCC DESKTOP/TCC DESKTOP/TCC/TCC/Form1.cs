using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using System.Threading;
using MySql.Data;
using MySql.Data.MySqlClient;

namespace TCC
{
    public partial class Form1 : Form
    {
        public Form1()
        {
            
            InitializeComponent();
        }

        private void Form1_Load(object sender, EventArgs e)
        {

        }

        private void button1_Click(object sender, EventArgs e)
        {
            {


                String Conexao = "server=143.106.241.3;port=3306;User ID= cl200250;database= cl200250;password=cl*31012005;SslMode=none";
                var connection = new MySqlConnection(Conexao);
                var comand = connection.CreateCommand();
               MySqlCommand query = new MySqlCommand("select count(*) from Funcionarios where  chapa = '"+txtnome.Text+"'and senha = '"+txtsenha.Text+"'",connection);
                connection.Open();
                DataTable dataTable = new DataTable();
                MySqlDataAdapter da = new MySqlDataAdapter(query);
                da.Fill(dataTable);
                foreach (DataRow list in dataTable.Rows)
                {
                    if (Convert .ToInt32(list.ItemArray[0])>0)
                    {

                        MessageBox.Show("Usuario validado", "Validação", MessageBoxButtons.OK, MessageBoxIcon.Information);
                        
                        Form2 form = new Form2();
                        form.Show();
                        this.Hide();

                    }
                       else
                    {
                        MessageBox.Show("Usuario invalido", "Validação", MessageBoxButtons.OK, MessageBoxIcon.Exclamation);

                    }                                               
                }
           connection.Close();


            }
        }

        private void label1_Click(object sender, EventArgs e)
        {

        }

        private void label3_Click(object sender, EventArgs e)
        {

        }

        private void textBox1_TextChanged(object sender, EventArgs e)
        {

        }
    }
}
